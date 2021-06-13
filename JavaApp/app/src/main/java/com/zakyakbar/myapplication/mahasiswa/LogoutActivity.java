package com.zakyakbar.myapplication.mahasiswa;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

import com.zakyakbar.myapplication.R;
import com.zakyakbar.myapplication.Utils.SharedPrefManager;

public class LogoutActivity extends AppCompatActivity {

    Button keluar, batal;

    SharedPrefManager sharedPrefManager;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_logout);
        keluar = (Button) findViewById(R.id.keluar);
        batal = (Button) findViewById(R.id.batal);

        sharedPrefManager = new SharedPrefManager (this);

        keluar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sharedPrefManager.saveSPBoolean(SharedPrefManager.SP_SUDAH_LOGIN, false);
                startActivity(new Intent(LogoutActivity.this, LoginActivity.class)
                        .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
                finish();
            }
        });

        batal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(LogoutActivity.this, MainActivity.class));
                finish();

            }
        });

    }
}