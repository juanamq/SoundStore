package com.example.soundstore;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;
import java.util.stream.Collectors;

public class Adaptador_instrumento extends RecyclerView.Adapter< Adaptador_instrumento.ViewHolder >{

    List<Get_instrumento> ListaInstrumento;
    List<Get_instrumento> ListaOriginal;
    public Adaptador_instrumento(List<Get_instrumento> lista) {

        this.ListaInstrumento = lista;
        //ListaOriginal = new List<>();
        ListaOriginal.addAll(ListaInstrumento);
    }


    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View vista = LayoutInflater.from(parent.getContext()).inflate(R.layout.detalle_instrumentos, parent, false);
        return new ViewHolder(vista);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {
        Get_instrumento temporal = ListaInstrumento.get(position);
        holder.cargarDatos(temporal);
    }

    public void filtrado(String buscar){

        int longitud = buscar.length();
        if (longitud == 0) {
            ListaInstrumento.clear();
            ListaInstrumento.addAll(ListaOriginal);
        } else {
            if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.N) {
                List<Get_instrumento> collecion = ListaInstrumento.stream()
                        .filter(i -> i.getNombre().toLowerCase().contains(buscar.toLowerCase()))
                        .collect(Collectors.toList());
                ListaInstrumento.clear();
                ListaInstrumento.addAll(collecion);
            } else {
                for (Get_instrumento c : ListaOriginal) {
                    if (c.getNombre().toLowerCase().contains(buscar.toLowerCase())) {
                        ListaInstrumento.add(c);
                    }
                }
            }
        }
        notifyDataSetChanged();

    }

    @Override
    public int getItemCount() {
        return ListaInstrumento.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        TextView nombre;
        Context contexto;


        int id_pokemon;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            contexto = itemView.getContext();
            nombre = itemView.findViewById(R.id.nombre);
        }

        public void cargarDatos(Get_instrumento temporal) {


        }
    }
}
