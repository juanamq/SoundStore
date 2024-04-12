package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;

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

public class Instrumentos extends AppCompatActivity {

    RecyclerView recycler_instrumentos;
    List<ExtraArticulos> lista_instrumentos;
    Spinner spinnerInstrumento;
    AdaptadorInstrumentos adaptador_instrumentos;
    Config config;
    String id_usuario;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_instrumentos);
        config = new Config(getApplicationContext());
        recycler_instrumentos = findViewById(R.id.recycler_instrumentos);
        spinnerInstrumento = findViewById(R.id.spinner_instrumento);
        id_usuario = getIntent().getStringExtra("id_usuario");
        System.out.println("Id Usuario Compras " + id_usuario);
        List<String> opcionesInstrumento = new ArrayList<>();
        opcionesInstrumento.add("Todos");
        opcionesInstrumento.add("Guitarra");
        opcionesInstrumento.add("Bateria");
        opcionesInstrumento.add("Piano");
        opcionesInstrumento.add("Tambor");
        opcionesInstrumento.add("Flauta");
        ArrayAdapter<String> adapterInstrumento = new ArrayAdapter<>(this, android.R.layout.simple_spinner_item, opcionesInstrumento);
        adapterInstrumento.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerInstrumento.setAdapter(adapterInstrumento);

        spinnerInstrumento.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                aplicarFiltro(opcionesInstrumento.get(position));
            }
            @Override
            public void onNothingSelected(AdapterView<?> parent) {}
        });

        TraerInstrumentos();
    }

    public void aplicarFiltro(String texto){
        List<ExtraArticulos> listaTemporal = new ArrayList<>();
        if(texto.equalsIgnoreCase("Todos")){
            listaTemporal = lista_instrumentos;
        }else{
            for (int i=0;i<lista_instrumentos.size();i++){
                if (lista_instrumentos.get(i).getTipo().equalsIgnoreCase(texto)){
                    listaTemporal.add(lista_instrumentos.get(i));
                }
            }
        }

        adaptador_instrumentos = new AdaptadorInstrumentos(listaTemporal,id_usuario);
        recycler_instrumentos.setAdapter(adaptador_instrumentos);
        recycler_instrumentos.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
    }

    public void TraerInstrumentos() {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/obtenerInstrumentos.php");

        JsonObjectRequest solicitud = new JsonObjectRequest(Request.Method.GET, url, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                try {
                    JSONArray articulos = response.getJSONArray("intrumentos");
                    System.out.println("El servidor responde ok:");
                    lista_instrumentos = new ArrayList<>();
                    for (int i = 0; i < articulos.length(); i++) {
                        JSONObject articulo = articulos.getJSONObject(i);

                        String foto = config.getEndpoint("soundstore/dist/img/"+articulo.getString("foto"));
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

                        lista_instrumentos.add(new ExtraArticulos(nombre,marca,foto, tipo,color,modelo,precio));

                    }
                    adaptador_instrumentos = new AdaptadorInstrumentos(lista_instrumentos,id_usuario);
                    recycler_instrumentos.setAdapter(adaptador_instrumentos);
                    recycler_instrumentos.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
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