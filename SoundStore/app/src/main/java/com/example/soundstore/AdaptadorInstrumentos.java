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

import com.squareup.picasso.Picasso;

import java.util.List;

public class AdaptadorInstrumentos extends RecyclerView.Adapter<AdaptadorInstrumentos.ViewHolder> {

    List<ExtraArticulos> ListaInstrumentos;
    String id_usuario;

    public AdaptadorInstrumentos(List<ExtraArticulos> lista,String id_usuario) {
        this.ListaInstrumentos = lista;
        this.id_usuario = id_usuario;
    }

    @NonNull
    @Override
    public AdaptadorInstrumentos.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View vista = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_instrumentos, parent, false);
        return new AdaptadorInstrumentos.ViewHolder(vista);
    }

    @Override
    public void onBindViewHolder(@NonNull AdaptadorInstrumentos.ViewHolder holder, int position) {
        ExtraArticulos temporal = ListaInstrumentos.get(position);
        holder.cargarDatos(temporal);
    }

    @Override
    public int getItemCount() {
        return ListaInstrumentos.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        ImageView imagen_instrumento;
        String img_instrumento;
        TextView nombre_instrumento;
        String name_instrumento;
        TextView marca_instrumento;
        String marc_instrumento;
        TextView tipo_instrumento;
        String tip_instrumento;
        TextView color_instrumento;
        String col_instrumentos;
        TextView modelo_instrumento;
        String model_instrumento;
        TextView precio_instrumento;
        TextView cantidad;
        String prec_instrumento;
        ImageButton btnComprar;
        Button btnAumentarCantidad;
        Button btnDisminuirCantidad;
        Context contexto;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            contexto = itemView.getContext();
            imagen_instrumento = itemView.findViewById(R.id.imagen_instrumento);
            nombre_instrumento = itemView.findViewById(R.id.nombre_instrumento);
            marca_instrumento = itemView.findViewById(R.id.marca_instrumento);
            tipo_instrumento = itemView.findViewById(R.id.tipo_instrumento);
            color_instrumento = itemView.findViewById(R.id.color_instrumento);
            modelo_instrumento = itemView.findViewById(R.id.modelo_instrumento);
            precio_instrumento = itemView.findViewById(R.id.precio_instrumento);
            cantidad = itemView.findViewById(R.id.cantidad_comprada);
            btnAumentarCantidad = itemView.findViewById(R.id.btnAumentarCantidad);
            btnDisminuirCantidad = itemView.findViewById(R.id.btnDisminuirCantidad);
            btnComprar = itemView.findViewById(R.id.btnComprar);

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

        public void cargarDatos(ExtraArticulos datos) {
            Picasso.get().load(datos.getFoto()).into(imagen_instrumento);
            img_instrumento = datos.getFoto();

            nombre_instrumento.setText(datos.getNombre());
            name_instrumento = datos.getNombre();

            marca_instrumento.setText("Marca: " + datos.getMarca());
            marc_instrumento = datos.getMarca();

            tipo_instrumento.setText("Tipo: " + datos.getTipo());
            tip_instrumento = datos.getTipo();

            color_instrumento.setText("Color: " + datos.getColor());
            col_instrumentos = datos.getColor();

            modelo_instrumento.setText("Modelo: " + datos.getModelo());
            model_instrumento = datos.getModelo();

            precio_instrumento.setText("Precio: $" + datos.getPrecio());
            prec_instrumento = datos.getPrecio();

            btnComprar.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(contexto, ComprarInstrumento.class);
                    intent.putExtra("id_usuario", id_usuario);
                    intent.putExtra("img_instrumento", img_instrumento);
                    intent.putExtra("name_instrumento", name_instrumento);
                    intent.putExtra("marc_instrumento", marc_instrumento);
                    intent.putExtra("tip_instrumento", tip_instrumento);
                    intent.putExtra("col_instrumentos", col_instrumentos);
                    intent.putExtra("model_instrumento", model_instrumento);
                    intent.putExtra("prec_instrumento", prec_instrumento);
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
