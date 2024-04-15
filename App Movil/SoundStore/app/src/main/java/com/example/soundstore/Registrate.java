package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.soundstore.utils.Config;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;


public class Registrate extends AppCompatActivity {
    Config config;
    EditText campo_cedula;
    EditText campo_nombre;
    EditText campo_apellido;
    EditText campo_email;
    EditText campo_direccion;
    EditText campo_telefono;
    EditText campo_contrasena;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registrate);
        config = new Config(getApplicationContext());
        campo_cedula = findViewById(R.id.campo_cedula);
        campo_nombre = findViewById(R.id.campo_nombre);
        campo_apellido = findViewById(R.id.campo_apellido);
        campo_email = findViewById(R.id.campo_email);
        campo_direccion = findViewById(R.id.campo_direccion);
        campo_telefono = findViewById(R.id.campo_telefono);
        campo_contrasena = findViewById(R.id.campo_contrasena);
    }
    public void registrarUsuario(View vista) {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/InsertUser.php");
        String cedula = campo_cedula.getText().toString();
        String nombre = campo_nombre.getText().toString();
        String apellido = campo_apellido.getText().toString();
        String email= campo_email.getText().toString();
        String direccion = campo_direccion.getText().toString();
        String contrasena = campo_contrasena.getText().toString();
        String telefono = campo_telefono.getText().toString();
        String tipo = "CLIENTE";
        String  estado = "ACTIVO";

        StringRequest solicitud = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonResponse = new JSONObject(response);
                    boolean success = jsonResponse.getBoolean("status");
                    String message = jsonResponse.getString("message");
                    if (success) {
                        Toast.makeText(getApplicationContext(), message, Toast.LENGTH_SHORT).show();
                        finish();
                    } else {
                        if (message.equals("ERROR##CORREO##EXISTE")) {
                            Toast.makeText(Registrate.this, "El correo electrónico ya está registrado", Toast.LENGTH_SHORT).show();
                        } else {
                            Toast.makeText(Registrate.this, "Error en el registro: " + message, Toast.LENGTH_SHORT).show();
                        }
                    }
                } catch (JSONException e) {
                    throw new RuntimeException(e);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                // Manejar errores de conexión o de la API
                Toast.makeText(getApplicationContext(), "Error en la solicitud: " + error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("cedula", cedula);
                params.put("nombre", nombre);
                params.put("apellido", apellido);
                params.put("email", email);
                params.put("direccion", direccion);
                params.put("contrasena", contrasena);
                params.put("telefono", telefono);
                params.put("tipo", tipo);
                params.put("estado", estado);
                return params;
            }
        };
        queue.add(solicitud);
    }
}



