package com.example.soundstore;

public class Mantenimientos {
    String tipo_instrumento;
    String marca;
    String modelo;
    String tiempo;
    String fecha;
    String estado;

    public Mantenimientos(String tipo_instrumento, String marca, String modelo, String tiempo, String fecha, String estado) {
        this.tipo_instrumento = tipo_instrumento;
        this.marca = marca;
        this.modelo = modelo;
        this.tiempo = tiempo;
        this.fecha = fecha;
        this.estado = estado;
    }

    public String getTipo_instrumento() {
        return tipo_instrumento;
    }

    public void setTipo_instrumento(String tipo_instrumento) {
        this.tipo_instrumento = tipo_instrumento;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    public String getTiempo() {
        return tiempo;
    }

    public void setTiempo(String tiempo) {
        this.tiempo = tiempo;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public String getEstado() {
        return estado;
    }

    public void setEstado(String estado) {
        this.estado = estado;
    }
}
