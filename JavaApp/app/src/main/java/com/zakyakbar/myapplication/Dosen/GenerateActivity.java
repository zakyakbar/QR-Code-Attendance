package com.zakyakbar.myapplication.Dosen;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.MultiFormatWriter;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.journeyapps.barcodescanner.BarcodeEncoder;
import com.zakyakbar.myapplication.R;
import com.zakyakbar.myapplication.Utils.SharedPrefManager;

public class GenerateActivity extends AppCompatActivity {

    private Button generate, logout;
    private EditText editText;
    private TextView tvNama;

    SharedPrefManager sharedPrefManager;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_generate);

        Intent intent = getIntent();

        String nama = intent.getStringExtra("nama");

        tvNama = (TextView) this.findViewById(R.id.tvNama);
        tvNama.setText(nama);

        sharedPrefManager = new SharedPrefManager(this);

        final Context context = this;
        editText = (EditText) this.findViewById(R.id.editText);
        editText.setText(sharedPrefManager.getSPQrCode());

        generate = (Button) this.findViewById(R.id.btngenerate);
        logout = (Button) findViewById(R.id.btnLogout);


        generate.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                String textQr = editText.getText().toString();

                MultiFormatWriter multiFormatWriter = new MultiFormatWriter();
                try {
                    BitMatrix bitMatrix = multiFormatWriter.encode(textQr, BarcodeFormat.QR_CODE, 200, 200);
                    BarcodeEncoder barcodeEncoder = new BarcodeEncoder();
                    Bitmap bitmap = barcodeEncoder.createBitmap(bitMatrix);
                    Intent intent = new Intent(context, QrActivity.class);
                    intent.putExtra("pic", bitmap);
                    context.startActivity(intent);
                } catch (WriterException e) {
                    e.printStackTrace();
                }
            }
        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(GenerateActivity.this, LogoutActivity.class));
            }
        });
    }
}
