package com.example.soundstore.utils;

import android.content.Context;
import android.content.res.Resources;

import com.example.soundstore.R;

import java.io.IOException;
import java.io.InputStream;
import java.util.Properties;

public class Config {
    String api_host;
    public Config(Context contexto){
        // Carga el archivo properties
        Resources res = contexto.getResources();
        InputStream inputStream = res.openRawResource(R.raw.config);

        // Lee las propiedades del archivo
        try {
            Properties properties = new Properties();
            properties.load(inputStream);

            api_host = properties.getProperty("api_host");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public  String getEndpoint(String endpoint){
        return  api_host+endpoint;
    }

}
