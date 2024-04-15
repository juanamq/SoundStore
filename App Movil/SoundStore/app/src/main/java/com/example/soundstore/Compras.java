package com.example.soundstore;

public class Compras {
    String img_instrumento;
    String nombre;
    String precio_unitario;
    String cantidad;


    public Compras(String img_instrumento, String nombre, String precio_unitario, String cantidad) {
        this.img_instrumento = img_instrumento;
        this.nombre = nombre;
        this.precio_unitario = precio_unitario;
        this.cantidad = cantidad;
    }

    public String getImg_instrumento() {
        return img_instrumento;
    }

    public void setImg_instrumento(String img_instrumento) {
        this.img_instrumento = img_instrumento;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getPrecio_unitario() {
        return precio_unitario;
    }

    public void setPrecio_unitario(String precio_unitario) {
        this.precio_unitario = precio_unitario;
    }

    public String getCantidad() {
        return cantidad;
    }

    public void setCantidad(String cantidad) {
        this.cantidad = cantidad;
    }

}

