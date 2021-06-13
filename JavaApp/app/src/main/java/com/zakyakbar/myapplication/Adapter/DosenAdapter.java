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
import com.zakyakbar.myapplication.Model.SemuadosenItem;
import com.zakyakbar.myapplication.R;

import java.util.List;
import java.util.Random;

public class DosenAdapter extends RecyclerView.Adapter<DosenAdapter.DosenHolder> {

    List<SemuadosenItem> semuadosenItemList;
    Context mContext;

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

    public DosenAdapter(Context context, List<SemuadosenItem> dosenList){
        this.mContext = context;
        semuadosenItemList = dosenList;
    }

    @Override
    public DosenHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_dosen, parent, false);
        return new DosenHolder(itemView);
    }

    @Override
    public void onBindViewHolder(DosenHolder holder, int position) {
        final SemuadosenItem semuadosenitem = semuadosenItemList.get(position);
        holder.tvnip.setText(semuadosenitem.getNip());
        holder.tvNamaDosen.setText(semuadosenitem.getNama_Dosen());
        holder.tvEmail.setText(semuadosenitem.getEmail());
        holder.tvKontakDosen.setText(semuadosenitem.getKontak_Dosen());
        holder.tvAlamat.setText(semuadosenitem.getAlamat());


        String nama = semuadosenitem.getNama_Dosen();
        String firstCharNama_Dosen = nama.substring(0,1);
        TextDrawable drawable = TextDrawable.builder()
                .buildRound(firstCharNama_Dosen, getColor());
        holder.ivTextDrawable.setImageDrawable(drawable);
    }

    @Override
    public int getItemCount(){
        return  semuadosenItemList == null ? 0 : semuadosenItemList.size();
    }

    public class DosenHolder extends RecyclerView.ViewHolder{

        ImageView ivTextDrawable;

        TextView tvnip;
        TextView tvNamaDosen;
        TextView tvEmail;
        TextView tvKontakDosen;
        TextView tvAlamat;



        public DosenHolder (View itemView) {
            super(itemView);

            ivTextDrawable = (ImageView) itemView.findViewById(R.id.ivTextDrawable);
            tvnip = (TextView)itemView.findViewById(R.id.tvnip);
            tvNamaDosen = (TextView)itemView.findViewById(R.id.tvNamaDosen);
            tvEmail = (TextView)itemView.findViewById(R.id.tvEmail);
            tvKontakDosen = (TextView)itemView.findViewById(R.id.tvKontakDosen);
            tvAlamat = (TextView)itemView.findViewById(R.id.tvAlamat);
        }
    }

    public int getColor() {
        String color;

        // Randomly select a fact
        Random randomGenerator = new Random();
        int randomNumber = randomGenerator.nextInt(mColors.length);

        color = mColors[randomNumber];
        int colorAsInt = Color.parseColor(color);

        return colorAsInt;
    }
}
