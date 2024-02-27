<?php

namespace App\Models;


class Post
{
    private static $repo_posts = [
        [
            "id" => "1",
            "title" => "Analisis Struktur Komunitas Biota Asosiasi pada Kawasan Rehabilitasi Ekosistem Mangrove di Kabupaten Tangerang ﻿",
            "author" => "Solihat, Ai | Damar, Ario | Kurniawan, Fery (2022)",
            "abstract" => "Wilayah pesisir Kabupaten Tangerang memiliki kawasan mangrove yang sedang dalam proses rehabilitasi. Makrozoobentos merupakan biota asosiasi pada kawasan ekosistem mangrove. Penelitian ini bertujuan untuk menganalisis sebaran makrozoobentos dan komponen utama yang mempengaruhi keberadaan makrozoobentos pada ekosistem mangrove di pesisir Kabupaten Tangerang. Penelitian dilaksanakan pada bulan Februari hingga Maret 2022 di tiga desa, yaitu Desa Ketapang, Desa Patramanggala, dan Desa Tanjung Pasir, Kabupaten Tangerang. Analisis data terdiri atas penentuan stasiun pengambilan contoh, pengolahan data vegetasi mangrove, pengolahan data makrozoobentos, dan penutupan kanopi menggunakan aplikasi ImageJ. Hasil analisis komponen utama menunjukkan sebaran makrozoobentos di pesisir Kabupaten Tangerang di tiga desa dipengaruhi oleh suhu tanah, pH air, penutupan mangrove, tipe substrat, dan jenis mangrove. Komposisi jenis makrozoobentos di Desa Ketapang dan Tanjung Pasir didominasi oleh kelas Gastropoda, serta di Desa Patramanggala didominasi kelas Bivalvia.
            The coastal area of Tangerang Regency has a mangrove area that is in the process of being rehabilitated. Macrozoobenthos is association biota in the mangrove ecosystem area. This study aims to analyze the distribution of macrozoobenthos and the main components that affect the presence of macrozoobenthos in the mangrove ecosystem on the coast of Tangerang Regency. The research was conducted from February until March 2022 in three villages, Ketapang Village, Patramangala Village, and Tanjung Pasir Village, Tangerang Regency. Data analysis consisted of determining sampling stations, processing mangrove vegetation data, processing macrozoobenthos data, and canopy closure using the ImageJ application. The results of the main component analysis showed that the distribution of macrozoobenthos on the coast of Tangerang Regency in three villages was influenced by soil temperature, water pH, mangrove cover, substrate type, and mangrove species. The composition of the macrozoobenthos species in the Ketapang and Tanjung Pasir villages was dominated by the Gastropod class, and in Patramanggala Village, it was dominated by the Bivalvia class."
        ],
        [
            "id" => "2",
            "title" => "Judul kedua",
            "author" => "Dayat",
            "abstract" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius sed reprehenderit inventore quidem vitae aut, distinctio quam quas. Itaque adipisci maxime eaque, ullam distinctio voluptate, laborum eos eius qui molestiae sint magni iusto asperiores. Vitae maxime natus ad consequatur laudantium culpa, ratione nulla eum labore voluptatem nihil perspiciatis sit officiis reprehenderit sequi dolor facere? Excepturi ducimus veritatis, adipisci quasi, placeat, ipsa fugiat temporibus tempore vel laboriosam animi accusantium nostrum quae laborum quas minus voluptas cum eum dolor libero veniam expedita. Perferendis aliquid doloremque, accusamus numquam architecto non repellat saepe labore fugiat! Iste, laudantium nulla. Ab minima vel, corrupti obcaecati tempore veritatis modi unde minus adipisci quos eum cumque commodi natus quod at beatae laboriosam quidem sunt ducimus iure quam assumenda quae ipsam repellat. Delectus hic sequi corporis ratione nihil provident suscipit sapiente eius aut perferendis neque, officiis laboriosam consectetur numquam! Quas dicta vero voluptatum maiores, consectetur aspernatur optio cupiditate odit?"
        ],
    ];

    public static function all()
    {
        return collect(self::$repo_posts);
    }

    public static function find($id)
    {
        $posts = static::all();
        return $posts->firstWhere('id', $id);
    }
}
