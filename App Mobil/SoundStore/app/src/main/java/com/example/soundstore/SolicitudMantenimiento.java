package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
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
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class SolicitudMantenimiento extends AppCompatActivity {

    Config config;
    Spinner spinnerInstrumento;
    EditText campo_marca;
    EditText campo_modelo;
    EditText campo_tiempo;
    String fecha_registro;
    String id_usuarios;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_solicitud_mantenimiento);
        spinnerInstrumento = findViewById(R.id.spinner_instrumento);
        campo_marca = findViewById(R.id.campo_marca);
        campo_modelo = findViewById(R.id.campo_modelo);
        campo_tiempo = findViewById(R.id.campo_tiempo);
        Date fechaHoraActual = new Date();
        SimpleDateFormat formato = new SimpleDateFormat("yyyy-MM-dd");
        String fechaHoraFormateada = formato.format(fechaHoraActual);
        fecha_registro= fechaHoraFormateada;

        config = new Config(getApplicationContext());
        id_usuarios = getIntent().getStringExtra("id_usuario");
        System.out.println("Id Usuario"+id_usuarios);
        List<String> opcionesInstrumento = new ArrayList<>();
        opcionesInstrumento.add("Tipo Instrumento");
        opcionesInstrumento.add("Guitarra");
        opcionesInstrumento.add("Batería");
        opcionesInstrumento.add("Piano");
        opcionesInstrumento.add("Tambor");
        opcionesInstrumento.add("Flauta");
        ArrayAdapter<String> adapterInstrumento = new ArrayAdapter<>(this, android.R.layout.simple_spinner_item, opcionesInstrumento);
        adapterInstrumento.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerInstrumento.setAdapter(adapterInstrumento);
    }

    public void registrarMantenimiento(View vista) {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/insertmantenimiento.php");
        String id_usuario = id_usuarios;
        String tipo_instrumento = spinnerInstrumento.getSelectedItem().toString();
        String marca= campo_marca.getText().toString();
        String modelo = campo_modelo.getText().toString();
        String tiempo = campo_tiempo.getText().toString();
        String fecha = fecha_registro;
        String  estado = "Pendiente";

        System.out.println("Id_usuario"+id_usuario);
        System.out.println("Tipo Instrumento"+tipo_instrumento);
        System.out.println("Marca"+marca);
        System.out.println("Modelo"+modelo);
        System.out.println("Tiempo"+tiempo);
        System.out.println("Fecha"+fecha);
        System.out.println("Estado"+estado);

        StringRequest solicitud = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    System.out.println("El servidor POST responde OK");
                    JSONObject jsonObject = new JSONObject(response);
                    System.out.println(response);
                    Toast.makeText(SolicitudMantenimiento.this, "Mantenimiento Realizado con exito", Toast.LENGTH_SHORT).show();
                    finish();
                } catch (JSONException e) {
                    System.out.println("El servidor POST responde con un error:");
                    System.out.println(e.getMessage());
                    Toast.makeText(SolicitudMantenimiento.this, "El correo electrónico ya está registrado", Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                System.out.println("El servidor POST responde con un error:");
                System.out.println(error.getMessage());
            }
        }){
            protected Map<String, String> getParams(){
                Map<String, String> params = new HashMap<String, String>();
                params.put("id_usuario", id_usuario);
                params.put("tipo_instrumento", tipo_instrumento);
                params.put("marca", marca);
                params.put("modelo", modelo);
                params.put("tiempo", tiempo);
                params.put("fecha", fecha);
                params.put("estado", estado);

                return params;
            }
        };
        queue.add(solicitud);
    }

}