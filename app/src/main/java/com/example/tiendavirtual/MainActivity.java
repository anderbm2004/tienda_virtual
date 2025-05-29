package com.example.tiendavirtual;

import android.os.Bundle;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        TextView mensaje = new TextView(this);
        mensaje.setText("¡mi primera tienda en android!");
        mensaje.setTextSize(24);
        mensaje.setPadding(30, 200, 30, 0);

        setContentView(mensaje);
    }
}
