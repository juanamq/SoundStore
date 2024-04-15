package com.example.soundstore;

public class ExtraArticulos {

    String nombre;
    String marca;
    String foto;
    String tipo;
    String color;
    String modelo;
    String precio;

    public ExtraArticulos(String nombre, String marca, String foto, String tipo, String color, String modelo, String precio) {
        this.nombre = nombre;
        this.marca = marca;
        this.foto = foto;
        this.tipo = tipo;
        this.color = color;
        this.modelo = modelo;
        this.precio = precio;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public String getFoto() {
        return foto;
    }

    public void setFoto(String foto) {
        this.foto = foto;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    public String getPrecio() {
        return precio;
    }

    public void setPrecio(String precio) {
        this.precio = precio;
    }
}
