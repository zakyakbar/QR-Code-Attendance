package com.zakyakbar.myapplication.Adapter;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.amulyakhare.textdrawable.TextDrawable;
import com.zakyakbar.myapplication.Model.SemuamatkulItem;
import com.zakyakbar.myapplication.R;

import java.util.List;
import java.util.Random;

public class MatkulAdapter extends RecyclerView.Adapter<MatkulAdapter.MatkulHolder> {

    Context mContext;
    List<SemuamatkulItem> semuamatkulItemList;

    public String[] mColors = {
            "#39add1", // light blue
            "#3079ab", // dark blue
            "#c25975", // mauve
            "#e15258", // red
            "#f9845b", // orange
            "#838cc7", // lavender
            "#7d669e", // purple
            "#53bbb4", // aqua
            "#51b46d", // green
            "#e0ab18", // mustard
            "#637a91", // dark gray
            "#f092b0", // pink
            "#b7c0c7"  // light gray
    };

    public MatkulAdapter(Context context, List<SemuamatkulItem> matkulList) {
        this.mContext = context;
        semuamatkulItemList = matkulList;
    }

    @Override
    public MatkulAdapter.MatkulHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_matkul, parent, false);
        return new MatkulHolder(itemView);
    }

    @Override
    public void onBindViewHolder(MatkulAdapter.MatkulHolder holder, int position) {
        final SemuamatkulItem semuamatkulItem = semuamatkulItemList.get(position);
        holder.tvId_mk.setText(semuamatkulItem.getId_mk());
        holder.tvNamaMatkul.setText(semuamatkulItem.getNama_Matkul());
        holder.tvSemester.setText(semuamatkulItem.getSemester());
        holder.tvNamaDosen.setText(semuamatkulItem.getNama_Dosen());

        String nama = semuamatkulItem.getNama_Matkul();
        String firstCharNama_Matkul = nama.substring(0, 1);
        TextDrawable drawable = TextDrawable.builder()
                .buildRound(firstCharNama_Matkul, getColor());
        holder.ivTextDrawable.setImageDrawable(drawable);
    }

    @Override
    public int getItemCount() {
        return semuamatkulItemList.size();
    }

    public class MatkulHolder extends RecyclerView.ViewHolder {

        ImageView ivTextDrawable;

        TextView tvId_mk;
        TextView tvNamaMatkul;
        TextView tvSemester;
        TextView tvNamaDosen;




        public MatkulHolder(View itemView) {
            super(itemView);

            ivTextDrawable = (ImageView) itemView.findViewById(R.id.ivTextDrawable);
            tvId_mk = (TextView) itemView.findViewById(R.id.tvId_mk);
            tvNamaMatkul = (TextView) itemView.findViewById(R.id.tvNamaMatkul);
            tvSemester = (TextView) itemView.findViewById(R.id.tvSemester);
            tvNamaDosen = (TextView) itemView.findViewById(R.id.tvNamaDosen);


        }
    }

    public int getColor() {
        String color;

        // Randomly select a fact
        Random randomGenerator = new Random(); // Construct a new Random number generator
        int randomNumber = randomGenerator.nextInt(mColors.length);

        color = mColors[randomNumber];
        int colorAsInt = Color.parseColor(color);

        return colorAsInt;
    }
}