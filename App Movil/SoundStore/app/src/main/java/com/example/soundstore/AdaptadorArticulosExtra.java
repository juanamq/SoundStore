package com.example.soundstore;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;
import androidx.recyclerview.widget.RecyclerView.Adapter;

import com.squareup.picasso.Picasso;

import java.util.List;

public class AdaptadorArticulosExtra  extends Adapter<AdaptadorArticulosExtra.ViewHolder> {

    List<ExtraArticulos> ListaArticulosExtras;
    String id_usuario;
    public AdaptadorArticulosExtra(List<ExtraArticulos> lista,String id_usuario) {

        this.ListaArticulosExtras = lista;
        this.id_usuario = id_usuario;
    }
    @NonNull
    @Override
    public AdaptadorArticulosExtra.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View vista = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_articulos_extras, parent, false);
        return new AdaptadorArticulosExtra.ViewHolder(vista);
    }

    @Override
    public void onBindViewHolder(@NonNull AdaptadorArticulosExtra.ViewHolder holder, int position) {
        ExtraArticulos temporal = ListaArticulosExtras.get(position);
        holder.cargarDatos(temporal);

    }

    @Override
    public int getItemCount() {
        return ListaArticulosExtras.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imagen_articulo;
        String img_instrumento;
        TextView nombre_articulo;
        String name_instrumento;
        TextView  marca_articulo;
        String marc_instrumento;
        TextView tipo_articulo;
        String tip_instrumento;
        TextView color_articulo;
        String col_instrumentos;
        TextView modelo_articulo;
        String model_instrumento;
        TextView precio_articulo;
        String prec_instrumento;
        Button btnAumentarCantidad;
        Button btnDisminuirCantidad;
        TextView cantidad;
        ImageButton btnComprar;
        Context contexto;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            contexto = itemView.getContext();
            imagen_articulo = itemView.findViewById(R.id.imagen_articulo);
            nombre_articulo = itemView.findViewById(R.id.nombre_articulo);
            marca_articulo = itemView.findViewById(R.id.marca_articulo);
            tipo_articulo = itemView.findViewById(R.id.tipo_articulo);
            color_articulo = itemView.findViewById(R.id.color_articulo);
            modelo_articulo = itemView.findViewById(R.id.modelo_articulo);
            precio_articulo = itemView.findViewById(R.id.precio_articulo);
            cantidad = itemView.findViewById(R.id.cantidad_comprada);
            btnComprar = itemView.findViewById(R.id.btnComprar);
            btnAumentarCantidad = itemView.findViewById(R.id.btnAumentarCantidad);
            btnDisminuirCantidad = itemView.findViewById(R.id.btnDisminuirCantidad);

            btnDisminuirCantidad.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    disminuirCantidad();
                }
            });

            btnAumentarCantidad.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    aumentarCantidad();
                }
            });

        }

        public  void cargarDatos(ExtraArticulos datos){
            Picasso.get().load(datos.getFoto()).into(imagen_articulo);
            nombre_articulo.setText(datos.getNombre());
            marca_articulo.setText("Marca: "+datos.getMarca());
            tipo_articulo.setText("Tipo: "+datos.getTipo());
            color_articulo.setText("Color: "+datos.getColor());
            modelo_articulo.setText("Modelo: "+datos.getModelo());
            precio_articulo.setText("Precio: $"+datos.getPrecio());
            btnComprar.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(contexto, ComprarInstrumento.class);
                    intent.putExtra("id_usuario", id_usuario);
                    intent.putExtra("img_instrumento",img_instrumento = datos.getFoto());
                    intent.putExtra("name_instrumento",name_instrumento = datos.getNombre());
                    intent.putExtra("marc_instrumento",marc_instrumento = datos.getMarca());
                    intent.putExtra("tip_instrumento",tip_instrumento = datos.getTipo());
                    intent.putExtra("col_instrumentos",col_instrumentos = datos.getColor());
                    intent.putExtra("model_instrumento",model_instrumento = datos.getModelo());
                    intent.putExtra("prec_instrumento", prec_instrumento = datos.getPrecio());
                    intent.putExtra("cantidad_instrumento", cantidad.getText().toString());
                    contexto.startActivity(intent);
                }
            });

        }
        private void disminuirCantidad() {
            int cantidadActual = Integer.parseInt(cantidad.getText().toString());
            if (cantidadActual > 0) {
                cantidadActual--;
                cantidad.setText(String.valueOf(cantidadActual));
            }
        }


        private void aumentarCantidad() {
            int cantidadActual = Integer.parseInt(cantidad.getText().toString());
            cantidadActual++;
            cantidad.setText(String.valueOf(cantidadActual));
        }

    }

}
