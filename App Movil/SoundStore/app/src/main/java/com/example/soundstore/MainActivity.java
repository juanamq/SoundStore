package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.RequestQueue;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.soundstore.utils.Config;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    EditText campo_correo;
    EditText campo_contrasena;
    TextView etq_registrarse;
    Config config;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        campo_correo = findViewById(R.id.campo_correo);
        campo_contrasena = findViewById(R.id.campo_contrasena);
        etq_registrarse = findViewById(R.id.etq_registrarse);
        config = new Config(getApplicationContext());
        validarSesion();
    }

    public void validarIngreso(View vista){
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/validarIngreso.php");

        StringRequest solicitud =  new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    System.out.println("El servidor POST responde OK");
                    JSONObject jsonObject = new JSONObject(response);

                    String id_usuario = jsonObject.getJSONObject("usuario").getString("id_usuario");
                    String tipo = jsonObject.getJSONObject("usuario").getString("tipo");
                    if (tipo.equalsIgnoreCase("CLIENTE")){
                        cambiarActivity(id_usuario);
                    }else {
                        Toast.makeText(MainActivity.this, "USUARIO NO VALIDO", Toast.LENGTH_SHORT).show();
                    }

                    System.out.println(response);
                } catch (JSONException e) {
                    System.out.println("El servidor POST responde con un error:");
                    Toast.makeText(MainActivity.this, "USUARIO NO VALIDO", Toast.LENGTH_SHORT).show();
                    campo_correo.setText("");
                    campo_contrasena.setText("");
                    System.out.println(e.getMessage());
                    System.out.println(e.toString());
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                System.out.println("El servidor POST responde con un error:");
                System.out.println(error.toString());
            }
        }){
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<>();
                params.put("email", campo_correo.getText().toString());
                params.put("contrasena", campo_contrasena.getText().toString());

                return params;
            }
        };

        queue.add(solicitud);
    }


    public  void cambiarActivity(String id_usuario){
        SharedPreferences archivo = getSharedPreferences("app-soundstore",MODE_PRIVATE);
        SharedPreferences.Editor editor = archivo.edit();
        editor.putString("id_usuario",id_usuario);
        editor.commit();

        Intent intencion = new Intent(getApplicationContext(),Menu.class);
        intencion.putExtra("id_usuario",id_usuario);
        startActivity(intencion);
        finish();
    }

    public void vistaRegistrate(View view) {
        Intent intent = new Intent(getApplicationContext(),Registrate.class);
        startActivity(intent);
    }

    public  void validarSesion(){
        SharedPreferences archivo = getSharedPreferences("app-soundstore",MODE_PRIVATE);
        String id_usuario = archivo.getString("id_usuario",null);
        if (id_usuario!=null){
            Intent intencion = new Intent(getApplicationContext(),Menu.class);
            startActivity(intencion);
            finish();
        }
    }
}