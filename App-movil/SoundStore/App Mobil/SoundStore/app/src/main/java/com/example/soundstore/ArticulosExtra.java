package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.example.soundstore.utils.Config;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class ArticulosExtra extends AppCompatActivity {
    RecyclerView recycler_articulos_extras;
    List<ExtraArticulos> lista_articulos;
    AdaptadorArticulosExtra adaptador_articulos;
    Config config;
    String id_usuario;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_articulos_extra);
        config = new Config(getApplicationContext());
        recycler_articulos_extras = findViewById(R.id.recycler_articulos_extras);
        id_usuario = getIntent().getStringExtra("id_usuario");
        System.out.println("Id Usuario Compras " + id_usuario);
        TraerArticulosExtra();
    }

    public void TraerArticulosExtra() {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/obtenerArticulosExtras.php");

        JsonObjectRequest solicitud = new JsonObjectRequest(Request.Method.GET, url, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                try {
                    JSONArray articulos = response.getJSONArray("articulos_extras");
                    System.out.println("El servidor responde ok:");
                    lista_articulos = new ArrayList<>();
                    for (int i = 0; i < articulos.length(); i++) {
                        JSONObject articulo = articulos.getJSONObject(i);

                        String foto =config.getEndpoint("soundstore/dist/img/"+articulo.getString("foto"));
                        System.out.println("Foto "+foto);
                        String nombre = articulo.getString("nombre");
                        System.out.println("Nombre "+nombre);
                        String marca = articulo.getString("marca");
                        System.out.println("Marca "+marca);
                        String tipo = articulo.getString("tipo");
                        System.out.println("Tipo "+tipo);
                        String color = articulo.getString("color");
                        System.out.println("Color "+color);
                        String modelo = articulo.getString("modelo");
                        System.out.println("Modelo"+modelo);
                        String precio = articulo.getString("precio");
                        System.out.println("Precio "+precio);

                        lista_articulos.add(new ExtraArticulos(nombre,marca,foto, tipo,color,modelo,precio));

                    }
                    adaptador_articulos = new AdaptadorArticulosExtra(lista_articulos,id_usuario);
                    recycler_articulos_extras.setAdapter(adaptador_articulos);
                    recycler_articulos_extras.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
                } catch (JSONException e) {
                    System.out.println("El servidor responde con un error:");
                    e.printStackTrace();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                // Manejar errores de la solicitud
                System.out.println("El servidor responde con un error:");
                System.out.println(error.getMessage());
            }
        });

        queue.add(solicitud);

    }
}