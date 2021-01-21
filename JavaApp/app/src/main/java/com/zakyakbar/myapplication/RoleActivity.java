package com.zakyakbar.myapplication;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

import com.zakyakbar.myapplication.Dosen.LoginActivity1;
import com.zakyakbar.myapplication.mahasiswa.LoginActivity;

public class RoleActivity extends AppCompatActivity {

    Button dosen;
    Button mahasiswa;


    @Override
    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_role);


        dosen = (Button) findViewById(R.id.btdosen);
        mahasiswa = (Button) findViewById(R.id.btmahasiswa);

        dosen.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(RoleActivity.this, LoginActivity1.class));

            }
        });

        mahasiswa.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(RoleActivity.this, LoginActivity.class));
            }
        });

    }
}