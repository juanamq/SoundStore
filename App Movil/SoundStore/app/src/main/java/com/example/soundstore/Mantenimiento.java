package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import com.example.soundstore.utils.Config;


public class Mantenimiento extends AppCompatActivity {

    TextView etq_solicitar_mantenimiento;
    TextView etq_ver_mantenimientos;
    Config config;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mantenimiento);
        etq_solicitar_mantenimiento = findViewById(R.id.etq_solicitar_mantenimiento);
        etq_ver_mantenimientos = findViewById(R.id.etq_ver_mantenimientos);
        config = new Config(getApplicationContext());
        SharedPreferences archivo = getSharedPreferences("app-soundstore",MODE_PRIVATE);
        String id_usuario = archivo.getString("id_usuario","");
    }
    public void verMantenimientos(View mantenimientos){
        SharedPreferences archivo = getSharedPreferences("app-soundstore", MODE_PRIVATE);
        String id_usuario = archivo.getString("id_usuario", "");
        Intent intent = new Intent(getApplicationContext(), MisMantenimientos.class);
        intent.putExtra("id_usuario", id_usuario);
        startActivity(intent);

    }

    public void solicitarMantenimientos(View mantenimientos){
        SharedPreferences archivo = getSharedPreferences("app-soundstore", MODE_PRIVATE);
        String id_usuario = archivo.getString("id_usuario", "");
        Intent intent = new Intent(getApplicationContext(), SolicitudMantenimiento.class);
        intent.putExtra("id_usuario", id_usuario);
        startActivity(intent);
    }

}