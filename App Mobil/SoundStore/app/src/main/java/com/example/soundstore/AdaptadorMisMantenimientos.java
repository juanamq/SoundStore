package com.example.soundstore;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.core.content.ContextCompat;
import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class  AdaptadorMisMantenimientos extends RecyclerView.Adapter<AdaptadorMisMantenimientos.ViewHolder> {
    List<Mantenimientos> ListaMantenimientos;
    public AdaptadorMisMantenimientos(List<Mantenimientos> lista) {

        this.ListaMantenimientos = lista;
    }

    @NonNull
    @Override
    public AdaptadorMisMantenimientos.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View vista = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_mis_mantenimientos, parent, false);
        return new AdaptadorMisMantenimientos.ViewHolder(vista);
    }

    @Override
    public void onBindViewHolder(@NonNull AdaptadorMisMantenimientos.ViewHolder holder, int position) {
        Mantenimientos temporal = ListaMantenimientos.get(position);
        holder.cargarDatos(temporal);
    }

    @Override
    public int getItemCount() {
        return ListaMantenimientos.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {

        TextView tipo_instrumento;
        TextView  marca_instrumento;
        TextView modelo_instrumento;
        TextView fecha_mantenimiento;
        TextView tiempo_mantenimiento;
        TextView estado_mantenimiento;
        Context contexto;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            contexto = itemView.getContext();
            tipo_instrumento = itemView.findViewById(R.id.tipo_instrumento);
            marca_instrumento = itemView.findViewById(R.id.marca_instrumento);
            modelo_instrumento = itemView.findViewById(R.id.modelo_instrumento);
            fecha_mantenimiento = itemView.findViewById(R.id.fecha_mantenimiento);
            tiempo_mantenimiento = itemView.findViewById(R.id.tiempo_mantenimiento);
            estado_mantenimiento = itemView.findViewById(R.id.estado_mantenimiento);
        }
        public  void cargarDatos(Mantenimientos datos){
            tipo_instrumento.setText(datos.getTipo_instrumento());
            marca_instrumento.setText(datos.getMarca());
            modelo_instrumento.setText(datos.getModelo());
            fecha_mantenimiento.setText(datos.getFecha());
            tiempo_mantenimiento.setText(datos.getTiempo());
            estado_mantenimiento.setText(datos.getEstado());

            if (datos.getEstado().equals("Pendiente")) {
                estado_mantenimiento.setTextColor(ContextCompat.getColor(contexto, R.color.rojo));
            } else if (datos.getEstado().equals("En Proceso")) {
                estado_mantenimiento.setTextColor(ContextCompat.getColor(contexto, R.color.azul));
            } else if (datos.getEstado().equals("Terminado")) {
                estado_mantenimiento.setTextColor(ContextCompat.getColor(contexto, R.color.verde));
            }

        }
    }
}
