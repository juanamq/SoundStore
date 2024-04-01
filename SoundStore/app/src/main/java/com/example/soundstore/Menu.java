package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.TextView;

import com.example.soundstore.utils.Config;


public class Menu extends AppCompatActivity {

    TextView menu_lateral;
    TextView etq_instrumentos;
    TextView etq_mantenimiento;
    TextView etq_compras;
    TextView etq_articulos_extra;
    Config config;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);
        menu_lateral = findViewById(R.id.menu_lateral);
        etq_instrumentos = findViewById(R.id.etq_instrumentos);
        etq_mantenimiento= findViewById(R.id.etq_mantenimiento);
        etq_compras= findViewById(R.id.etq_compras);
        etq_articulos_extra = findViewById(R.id.etq_articulos_extra );
        SharedPreferences archivo = getSharedPreferences("app-soundstore",MODE_PRIVATE);
        String id_usuario = archivo.getString("id_usuario","");
        System.out.println("Id Usuario"+id_usuario);
        String nombre = archivo.getString("nombre","");
        System.out.println("Nombre Usuaurio"+nombre);
        String apellido = archivo.getString("apellido","");
        System.out.println("Apellido Usuaurio"+apellido);
    }
}