package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
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

public class DetallesCompras extends AppCompatActivity {

    String id_usuario;
    int  total_compras = 0;
    RecyclerView recycler_compras;
    TextView etq_total;
    List<Compras> lista_compras;
    AdaptadorCompras adaptador_compras;
    Config config;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalles_compras);
        config = new Config(getApplicationContext());
        recycler_compras = findViewById(R.id.recycler_compras);
        etq_total = findViewById(R.id.etq_total);
        id_usuario = getIntent().getStringExtra("id_usuario");
        System.out.println("Id Usuario Compras " +id_usuario);
        traerCompras();
    }

    public void traerCompras() {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/getUserPurchases.php");

        StringRequest solicitud =  new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    System.out.println("El servidor POST responde OK");
                    JSONObject jsonObject = new JSONObject(response);
                    JSONArray comprasArray = jsonObject.getJSONArray("shopping");
                    lista_compras  = new ArrayList<>();

                    for (int i = 0; i < comprasArray.length(); i++) {
                        JSONObject compras = comprasArray.getJSONObject(i);
                        String img_instrumento = config.getEndpoint("soundstore/dist/img/"+compras.getString("img_instrumento"));;
                        String nombre = compras.getString("nombre");
                        String precio_unitario = compras.getString("precio_unitario");
                        String cantidad = compras.getString("cantidad");
                        String precio_total = compras.getString("precio_total");

                        lista_compras.add(new Compras(img_instrumento, nombre,precio_unitario, cantidad));
                        total_compras += Double.parseDouble(precio_total);

                        System.out.println("Mantenimiento #" + (i + 1));
                        System.out.println("Img Instrumento: " + img_instrumento);
                        System.out.println("Nombre Instrumento: " + nombre);
                        System.out.println("Precio unitario: " + precio_unitario);
                        System.out.println("cantidad: " + cantidad);
                        System.out.println("Precio total: " + precio_total);
                    }
                    adaptador_compras = new AdaptadorCompras(lista_compras);
                    recycler_compras.setAdapter(adaptador_compras);
                    etq_total.setText("$"+total_compras);
                    System.out.println("Precio total etq "+etq_total);
                    recycler_compras.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
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