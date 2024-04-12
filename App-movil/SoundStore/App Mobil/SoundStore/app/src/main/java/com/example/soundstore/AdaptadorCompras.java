package com.example.soundstore;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.util.List;

public class AdaptadorCompras extends RecyclerView.Adapter<AdaptadorCompras.ViewHolder> {

    List<Compras> ListaCompras;
    public AdaptadorCompras(List<Compras> lista) {

        this.ListaCompras = lista;
    }

    @NonNull
    @Override
    public AdaptadorCompras.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View vista = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_compras, parent, false);
        return new AdaptadorCompras.ViewHolder(vista);
    }

    @Override
    public void onBindViewHolder(@NonNull AdaptadorCompras.ViewHolder holder, int position) {
        Compras temporal = ListaCompras.get(position);
        holder.cargarDatos(temporal);

    }

    @Override
    public int getItemCount() {
        return ListaCompras.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imagen_instrumento;
        TextView precio_instrumento;
        TextView cantidad_instrumento;
        TextView nombre_instrumento;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            imagen_instrumento = itemView.findViewById(R.id.imagen_instrumento);
            precio_instrumento = itemView.findViewById(R.id.precio_instrumento);
            cantidad_instrumento = itemView.findViewById(R.id.cantidad_instrumento);
            nombre_instrumento = itemView.findViewById(R.id.nombre_instrumento);
        }
        public  void cargarDatos(Compras datos){
            Picasso.get().load(datos.getImg_instrumento()).into(imagen_instrumento);
            precio_instrumento.setText("$"+datos.getPrecio_unitario());
            cantidad_instrumento.setText(datos.getCantidad());
            nombre_instrumento.setText(datos.getNombre());
        }
    }
}

