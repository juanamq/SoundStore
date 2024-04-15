package com.example.soundstore;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

import com.example.soundstore.utils.Config;


public class Menu extends AppCompatActivity {

    TextView menu_lateral;
    TextView etq_instrumentos;
    TextView etq_mantenimiento;
    TextView etq_compras;
    TextView etq_articulos_extra;
    String id_usuario;

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
        id_usuario = archivo.getString("id_usuario","");
        System.out.println("Id Usuario Menu"+id_usuario);
    }

    public void VistaMantenimiento(View view) {
        Intent intent = new Intent(this,Mantenimiento.class);
        startActivity(intent);
    }
    public void VistaDetallesCompras(View detalles) {
        Intent intent = new Intent(getApplicationContext(),DetallesCompras.class);
        intent.putExtra("id_usuario",id_usuario);
        startActivity(intent);
    }

    public void VistaInstrumentos(View detalles) {
        Intent intent = new Intent(getApplicationContext(),Instrumentos.class);
        intent.putExtra("id_usuario",id_usuario);
        startActivity(intent);
    }

    public void VistaArticulosExtra(View detalles) {
        Intent intent = new Intent(getApplicationContext(),ArticulosExtra.class);
        intent.putExtra("id_usuario",id_usuario);
        startActivity(intent);
    }


    public  void cerrarSesion (View view){
        SharedPreferences archivo = getSharedPreferences("app-soundstore",MODE_PRIVATE);
        SharedPreferences.Editor editor = archivo.edit();
        editor.clear();
        editor.commit();
        Intent intencion = new Intent(getApplicationContext(),MainActivity.class);
        startActivity(intencion);
        finish();
    }
}