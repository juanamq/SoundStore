package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.soundstore.utils.Config;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class MisMantenimientos extends AppCompatActivity {

    String id_usuario;
    RecyclerView recycler_mantenimientos;
    List<Mantenimientos> lista_mantenimientos;
    AdaptadorMisMantenimientos adaptador_mis_mantenimientos;
    Config config;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mis_mantenimientos);
        config = new Config(getApplicationContext());
        id_usuario = getIntent().getStringExtra("id_usuario");
        recycler_mantenimientos = findViewById(R.id.recycler_mis_mantenimientos);
        System.out.println("Id Usuario "+id_usuario);
        traerMantenimientos();
    }

    public void traerMantenimientos() {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/getUserMaintenance.php");

        StringRequest solicitud =  new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    System.out.println("El servidor POST responde OK");
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray mantenimientosArray = jsonObject.getJSONArray("mantenimiento");
                    lista_mantenimientos  = new ArrayList<>();

                    for (int i = 0; i < mantenimientosArray.length(); i++) {
                        JSONObject mantenimiento = mantenimientosArray.getJSONObject(i);
                        String tipo_instrumento = mantenimiento.getString("tipo_instrumento");
                        String marca = mantenimiento.getString("marca");
                        String modelo = mantenimiento.getString("modelo");
                        String tiempo = mantenimiento.getString("tiempo");
                        String fecha = mantenimiento.getString("fecha");
                        String estado = mantenimiento.getString("estado");


                        lista_mantenimientos.add(new Mantenimientos(tipo_instrumento, marca,modelo, tiempo,fecha,estado));;

                        System.out.println("Mantenimiento #" + (i + 1));
                        System.out.println("Tipo Instrumento: " + tipo_instrumento);
                        System.out.println("Marca: " + marca);
                        System.out.println("Tiempo: " + tiempo);
                        System.out.println("Fecha: " + fecha);
                        System.out.println("Estado: " + estado);
                    }
                    adaptador_mis_mantenimientos = new AdaptadorMisMantenimientos(lista_mantenimientos);
                    recycler_mantenimientos.setAdapter(adaptador_mis_mantenimientos);
                    recycler_mantenimientos.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
                } catch (JSONException e) {
                    System.out.println("El servidor POST responde con un error:");
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
                params.put("id_usuario", id_usuario);
                return params;
            }
        };

        queue.add(solicitud);
    }
}