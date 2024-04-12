package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
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

import java.util.HashMap;
import java.util.Map;

public class ComprarInstrumento extends AppCompatActivity {
    Config config;
    String imginstrumento;
    String name_instrumento;
    String marc_instrumento;
    String tip_instrumento;
    String col_instrumentos;
    String model_instrumento;
    String prec_instrumento;

    String cantidad_comprada;
    String id_usuarioo;
    double precioUnitario;
    double precioTotal;
    int cantidad;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_comprar_instrumento);
        config = new Config(getApplicationContext());

        Bundle datos = getIntent().getExtras();

        id_usuarioo = datos.getString("id_usuario");
        imginstrumento = datos.getString("img_instrumento");
        name_instrumento = datos.getString("name_instrumento");
        marc_instrumento = datos.getString("marc_instrumento");
        tip_instrumento = datos.getString("tip_instrumento");
        col_instrumentos = datos.getString("col_instrumentos");
        model_instrumento = datos.getString("model_instrumento");
        prec_instrumento = datos.getString("prec_instrumento");
        cantidad_comprada = datos.getString("cantidad_instrumento");
         precioUnitario = Double.parseDouble(prec_instrumento);
         cantidad = Integer.parseInt(cantidad_comprada);
         precioTotal = precioUnitario * cantidad;
        System.out.println("Precio Unitario: "+precioTotal);
        System.out.println("Cantidad Parseada: "+cantidad);
        System.out.println("Precio Total: "+precioTotal);



        System.out.println("ID Usuario: "+ id_usuarioo);
        System.out.println("Imagen: "+ imginstrumento);
        System.out.println("Nombre: "+name_instrumento);
        System.out.println("Marca: "+marc_instrumento);
        System.out.println("Tipo: "+tip_instrumento);
        System.out.println("Color: "+col_instrumentos);
        System.out.println("Modelo: "+model_instrumento);
        System.out.println("Precio: "+prec_instrumento);
        System.out.println(" Cantidad Compro: "+cantidad_comprada);
        registrarMantenimiento();
    }

    public void registrarMantenimiento() {
        RequestQueue queue = Volley.newRequestQueue(getApplicationContext());
        String url = config.getEndpoint("Apisoundstore/InsertCompras.php");
        String marca = marc_instrumento;
        String id_usuario = id_usuarioo;
        String img_instrumento = imginstrumento ;
        String nombre = name_instrumento;
        String precio_unitario = prec_instrumento;
        String cantidad = cantidad_comprada;
        String precio_total=  String.valueOf(precioTotal);
        String estado = "ACTIVA";


        System.out.println("ID Usuario: "+ id_usuario);
        System.out.println("Imagen: "+ img_instrumento);
        System.out.println("Nombre: "+nombre);
        System.out.println("Marca: "+marca);
        System.out.println("Tipo: "+tip_instrumento);
        System.out.println("Color: "+col_instrumentos);
        System.out.println("Modelo: "+model_instrumento);
        System.out.println("Precio: "+prec_instrumento);
        System.out.println(" Cantidad Compro: "+cantidad_comprada);



        StringRequest solicitud = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    System.out.println("El servidor POST responde OK");
                    JSONObject jsonObject = new JSONObject(response);
                    System.out.println(response);
                    Toast.makeText(ComprarInstrumento.this, "Compra realizada con exito", Toast.LENGTH_SHORT).show();
                    finish();
                } catch (JSONException e) {
                    System.out.println("El servidor POST responde con un error:");
                    System.out.println(e.getMessage());
                    Toast.makeText(ComprarInstrumento.this, "Error al realizar la compra", Toast.LENGTH_SHORT).show();
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
                params.put("marca",marca);
                params.put("id_usuario",id_usuario);
                params.put("img_instrumento",img_instrumento);
                params.put("nombre",nombre);
                params.put("precio_unitario",precio_unitario);
                params.put("cantidad",cantidad);
                params.put("precio_total",precio_total);
                params.put("estado",estado);

                return params;
            }
        };
        queue.add(solicitud);
    }
}