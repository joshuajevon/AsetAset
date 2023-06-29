if (document.querySelector("#top-splide")) {
    let carouselItem = $(".splide__item");
    if (carouselItem.length == 1) {
        var topSplide = new Splide("#top-splide", {
            drag: false,
            arrows: false,
            height: "400px",
            breakpoints: {
                640: {
                    height: "200px",
                },
                768: {
                    height: "250px",
                },
                1024: {
                    height: "300px",
                },
                1280: {
                    height: "350px",
                },
                1536: {
                    height: "400px",
                },
            },
        });
        topSplide.mount();
    } else {
        var topSplide = new Splide("#top-splide", {
            autoplay: true,
            interval: 3500,
            drag: true,
            type: "loop",
            height: "400px",
            breakpoints: {
                640: {
                    height: "200px",
                },
                768: {
                    height: "250px",
                },
                1024: {
                    height: "300px",
                },
                1280: {
                    height: "350px",
                },
                1536: {
                    height: "400px",
                },
            },
        });
        topSplide.mount();
    }

    carouselItem.each(function () {
        let itemHref = $(this).attr("href");
        if (itemHref == "") {
            $(this).removeClass("hover:opacity-80");
            $(this).addClass("pointer-events-none");
        }
    });
}

function openFilter() {
    $("#dialog-filter").removeClass("hidden");
    $("#dialog-filter").addClass(
        "c-container fixed z-50 h-screen w-screen top-0 left-0 flex justify-center items-center"
    );
    $("#form-filter").addClass("max-h-[70%] w-full overflow-scroll");
    document.body.style.overflow = "hidden";
}

function closeFilter() {
    $("#dialog-filter").addClass("hidden");
    $("#dialog-filter").removeClass(
        "c-container fixed z-50 h-screen w-screen top-0 left-0 flex justify-center items-center"
    );
    $("#form-filter").removeClass("max-h-[70%] w-full overflow-scroll");
    document.body.style.overflow = "auto";
}

window.addEventListener(
    "resize",
    function (event) {
        var windowWidth =
            window.innerWidth || document.documentElement.clientWidth;

        if (windowWidth >= 1280) {
            closeFilter();
        }
    },
    true
);

const arrProvinsiKota = {
    Aceh: [
        "Kabupaten Aceh Barat",
        "Kabupaten Aceh Barat Daya",
        "Kabupaten Aceh Besar",
        "Kabupaten Aceh Jaya",
        "Kabupaten Aceh Selatan",
        "Kabupaten Aceh Singkil",
        "Kabupaten Aceh Tamiang",
        "Kabupaten Aceh Tengah",
        "Kabupaten Aceh Tenggara",
        "Kabupaten Aceh Timur",
        "Kabupaten Aceh Utara",
        "Kabupaten Bener Meriah",
        "Kabupaten Bireuen",
        "Kabupaten Gayo Lues",
        "Kabupaten Nagan Raya",
        "Kabupaten Pidie",
        "Kabupaten Pidie Jaya",
        "Kabupaten Simeulue",
        "Kabupaten Simeulue",
        "Kota Langsa",
        "Kota Lhokseumawe",
        "Kota Sabang",
        "Kota Subulussalam",
    ],
    Bali: [
        "Kabupaten Badung",
        "Kabupaten Bangli",
        "Kabupaten Buleleng",
        "Kabupaten Gianyar",
        "Kabupaten Jembrana",
        "Kabupaten Karangasem",
        "Kabupaten Klungkung",
        "Kabupaten Tabanan",
        "Kota Denpasar",
    ],
    Banten: [
        "Kabupaten Lebak",
        "Kabupaten Pandeglang",
        "Kabupaten Serang",
        "Kabupaten Tangerang",
        "Kota Cilegon",
        "Kota Serang",
        "Kota Tangerang",
        "Kota Tangerang Selatan",
    ],
    Bengkulu: [
        "Kabupaten Bengkulu Selatan",
        "Kabupaten Bengkulu Tengah",
        "Kabupaten Bengkulu Utara",
        "Kabupaten Kaur",
        "Kabupaten Kepahiang",
        "Kabupaten Lebong",
        "Kabupaten Mukomuko",
        "Kabupaten Rejang Lebong",
        "Kabupaten Seluma",
        "Kota Bengkulu",
    ],
    "Daerah Istimewa Yogyakarta": [
        "Kabupaten Bantul",
        "Kabupaten Gunungkidul",
        "Kabupaten Kulon Progo",
        "Kabupaten Sleman",
        "Kota Yogyakarta",
    ],
    "DKI Jakarta": [
        "Kabupaten Administrasi Kepulauan Seribu",
        "Kota Administrasi Jakarta Barat",
        "Kota Administrasi Jakarta Pusat",
        "Kota Administrasi Jakarta Selatan",
        "Kota Administrasi Jakarta Timur",
        "Kota Administrasi Jakarta Utara",
    ],
    Gorontalo: [
        "Kabupaten Boalemo",
        "Kabupaten Bone Bolango",
        "Kabupaten Gorontalo",
        "Kabupaten Gorontalo Utara",
        "Kabupaten Pohuwato",
        "Kota Gorontalo",
    ],
    Jambi: [
        "Kabupaten Batanghari",
        "Kabupaten Bungo",
        "Kabupaten Kerinci",
        "Kabupaten Merangin",
        "Kabupaten Muaro Jambi",
        "Kabupaten Sarolangun",
        "Kabupaten Tanjung Jabung Barat",
        "Kabupaten Tanjung Jabung Timur",
        "Kabupaten Tebo",
        "Kota Jambi",
        "Kota Sung Penuh",
    ],
    "Jawa Barat": [
        "Kabupaten Bandung",
        "Kabupaten Bandung Barat",
        "Kabupaten Bekasi",
        "Kabupaten Bogor",
        "Kabupaten Ciamis",
        "Kabupaten Cianjur",
        "Kabupaten Cirebon",
        "Kabupaten Garut",
        "Kabupaten Indramayu",
        "Kabupaten Karawang",
        "Kabupaten Kuningan",
        "Kabupaten Majalengka",
        "Kabupaten Pangandaran",
        "Kabupaten Purwakarta",
        "Kabupaten Subang",
        "Kabupaten Sukabumi",
        "Kabupaten Sumedang",
        "Kabupaten Tasikmalaya",
        "Kota Bandung",
        "Kota Banjar",
        "Kota Bekasi",
        "Kota Bogor",
        "Kota Cimahi",
        "Kota Cirebon",
        "Kota Depok",
        "Kota Sukabumi",
        "Kota Tasikmalaya",
    ],
    "Jawa Tengah": [
        "Kabupaten Banjarnegara",
        "Kabupaten Banyumas",
        "Kabupaten Batang",
        "Kabupaten Blora",
        "Kabupaten Boyolali",
        "Kabupaten Brebes",
        "Kabupaten Cilacap",
        "Kabupaten Demak",
        "Kabupaten Grobogan",
        "Kabupaten Jepara",
        "Kabupaten Karanganyar",
        "Kabupaten Kebumen",
        "Kabupaten Kendal",
        "Kabupaten Klaten",
        "Kabupaten Kudus",
        "Kabupaten Magelang",
        "Kabupaten Pati",
        "Kabupaten Pekalongan",
        "Kabupaten Pemalang",
        "Kabupaten Purbalingga",
        "Kabupaten Purworejo",
        "Kabupaten Rembang",
        "Kabupaten Semarang",
        "Kabupaten Sragen",
        "Kabupaten Sukoharjo",
        "Kabupaten Tegal",
        "Kabupaten Temanggung",
        "Kabupaten Wonogiri",
        "Kabupaten Wonosobo",
        "Kota Magelang",
        "Kota Pekalongan",
        "Kota Salatiga",
        "Kota Semarang",
        "Kota Surakarta",
        "Kota Tegal",
    ],
    "Jawa Timur": [
        "Kabupaten Bangkalan",
        "Kabupaten Banyuwangi",
        "Kabupaten Blitar",
        "Kabupaten Bojonegoro",
        "Kabupaten Bondowoso",
        "Kabupaten Gresik",
        "Kabupaten Jember",
        "Kabupaten Jombang",
        "Kabupaten Kediri",
        "Kabupaten Lamongan",
        "Kabupaten Lumajang",
        "Kabupaten Madiun",
        "Kabupaten Magetan",
        "Kabupaten Malang",
        "Kabupaten Mojokerto",
        "Kabupaten Nganjuk",
        "Kabupaten Ngawi",
        "Kabupaten Pacitan",
        "Kabupaten Pamekasan",
        "Kabupaten Pasuruan",
        "Kabupaten Ponorogo",
        "Kabupaten Probolinggo",
        "Kabupaten Sampang",
        "Kabupaten Sidoarjo",
        "Kabupaten Situbondo",
        "Kabupaten Sumenep",
        "Kabupaten Trenggalek",
        "Kabupaten Tuban",
        "Kabupaten Tulungagung",
        "Kota Batu",
        "Kota Blitar",
        "Kota Kediri",
        "Kota Madiun",
        "Kota Malang",
        "Kota Mojokerto",
        "Kota Pasuruan",
        "Kota Probolinggo",
        "Kota Surabaya",
    ],
    "Kalimantan Barat": [
        "Kabupaten Bengkayang",
        "Kabupaten Kapuas Hulu",
        "Kabupaten Kayong Utara",
        "Kabupaten Ketapang",
        "Kabupaten Kubu Raya",
        "Kabupaten Landak",
        "Kabupaten Melawi",
        "Kabupaten Mempawah",
        "Kabupaten Sambas",
        "Kabupaten Sanggau",
        "Kabupaten Sekadau",
        "Kabupaten Sintang",
        "Kota Pontianak",
        "Kota Singkawang",
    ],
    "Kalimantan Selatan": [
        "Kabupaten Balangan",
        "Kabupaten Banjar",
        "Kabupaten Barito Kuala",
        "Kabupaten Hulu Sungai Selatan",
        "Kabupaten Hulu Sungai Tengah",
        "Kabupaten Hulu Sungai Utara",
        "Kabupaten Kotabaru",
        "Kabupaten Tabalong",
        "Kabupaten Tanah Bumbu",
        "Kabupaten Tanah Laut",
        "Kabupaten Tapin",
        "Kota Banjarbaru",
        "Kota Banjarmasin",
    ],
    "Kalimantan Tengah": [
        "Kabupaten Barito Selatan",
        "Kabupaten Barito Timur",
        "Kabupaten Barito Utara",
        "Kabupaten Gunung Mas",
        "Kabupaten Kapuas",
        "Kabupaten Katingan",
        "Kabupaten Kotawaringin Barat",
        "Kabupaten Kotawaringin Timur",
        "Kabupaten Lamandau",
        "Kabupaten Murung Raya",
        "Kabupaten Pulang Pisau",
        "Kabupaten Sukamara",
        "Kabupaten Seruyan",
        "Kota Palangka Raya",
    ],
    "Kalimantan Timur": [
        "Kabupaten Barito Selatan",
        "Kabupaten Barito Timur",
        "Kabupaten Barito Utara",
        "Kabupaten Gunung Mas",
        "Kabupaten Kapuas",
        "Kabupaten Katingan",
        "Kabupaten Kotawaringin Barat",
        "Kabupaten Kotawaringin Timur",
        "Kabupaten Lamandau",
        "Kabupaten Murung Raya",
        "Kabupaten Pulang Pisau",
        "Kabupaten Sukamara",
        "Kabupaten Seruyan",
        "Kota Palangka Raya",
    ],
    "Kalimantan Utara": [
        "Kabupaten Bulungan",
        "Kabupaten Malinau",
        "Kabupaten Nunukan",
        "Kabupaten Tana Tidung",
        "Kota Tarakan",
    ],
    "Kepulauan Bangka Belitung": [
        "Kabupaten Bangka",
        "Kabupaten Bangka Barat",
        "Kabupaten Bangka Selatan",
        "Kabupaten Bangka Tengah",
        "Kabupaten Belitung",
        "Kabupaten Belitung Timur",
        "Kota Pangkalpinang",
    ],
    "Kepulauan Riau": [
        "Kabupaten Bintan",
        "Kabupaten Karimun",
        "Kabupaten Kepulauan Anambas",
        "Kabupaten Lingga",
        "Kabupaten Natuna",
        "Kota Batam",
        "Kota Tanjungpinang",
    ],
    Lampung: [
        "Kabupaten Lampung Barat",
        "Kabupaten Lampung Selatan",
        "Kabupaten Lampung Tengah",
        "Kabupaten Lampung Timur",
        "Kabupaten Lampung Utara",
        "Kabupaten Mesuji",
        "Kabupaten Pesawaran",
        "Kabupaten Pesisir Barat",
        "Kabupaten Pringsewu",
        "Kabupaten Tanggamus",
        "Kabupaten Tulang Bawang",
        "Kabupaten Tulang Bawang Barat",
        "Kabupaten Way Kanan",
        "Kota Bandar Lampung",
        "Kota Metro",
    ],
    Maluku: [
        "Kabupaten Buru",
        "Kabupaten Buru Selatan",
        "Kabupaten Kepulauan Aru",
        "Kabupaten Kepulauan Tanimbar",
        "Kabupaten Maluku Barat Daya",
        "Kabupaten Maluku Tengah",
        "Kabupaten Maluku Tenggara",
        "Kabupaten Seram Bagian Barat",
        "Kabupaten Seram Bagian Timur",
        "Kota Ambon",
        "Kota Tual",
    ],
    "Maluku Utara": [
        "Kabupaten Halmahera Barat",
        "Kabupaten Halmahera Tengah",
        "Kabupaten Halmahera Timur",
        "Kabupaten Halmahera Selatan",
        "Kabupaten Halmahera Utara",
        "Kabupaten Kepulauan Sula",
        "Kabupaten Pulau Morotai",
        "Kabupaten Pulau Taliabu",
        "Kota Ternate",
        "Kota Tidore Kepulauan",
    ],
    "Nusa Tenggara Barat": [
        "Kabupaten Bima",
        "Kabupaten Dompu",
        "Kabupaten Lombok Barat",
        "Kabupaten Lombok Tengah",
        "Kabupaten Lombok Timur",
        "Kabupaten Lombok Utara",
        "Kabupaten Sumbawa",
        "Kabupaten Sumbawa Barat",
        "Kota Bima",
        "Kota Mataram",
    ],
    "Nusa Tenggara Timur": [
        "Kabupaten Alor",
        "Kabupaten Belu",
        "Kabupaten Ende",
        "Kabupaten Flores Timur",
        "Kabupaten Kupang",
        "Kabupaten Lembata",
        "Kabupaten Malaka",
        "Kabupaten Manggarai",
        "Kabupaten Manggarai Barat",
        "Kabupaten Manggarai Timur",
        "Kabupaten Nagekeo",
        "Kabupaten Ngada",
        "Kabupaten Rote Ndao",
        "Kabupaten Sabu Raijua",
        "Kabupaten Sikka",
        "Kabupaten Sumba Barat",
        "Kabupaten Sumba Barat Daya",
        "Kabupaten Sumba Tengah",
        "Kabupaten Sumba Timur",
        "Kabupaten Timor Tengah Selatan",
        "Kabupaten Timor Tengah Utara",
        "Kota Kupang",
    ],
    Papua: [
        "Kabupaten Biak Numfor",
        "Kabupaten Jayapura",
        "Kabupaten Keerom",
        "Kabupaten Kepulauan Yapen",
        "Kabupaten Mamberamo Raya",
        "Kabupaten Sarmi",
        "Kabupaten Supiori",
        "Kabupaten Waropen",
        "Kota Jayapura",
    ],
    "Papua Barat": [
        "Kabupaten Fakfak",
        "Kabupaten Kaimana",
        "Kabupaten Manokwari",
        "Kabupaten Manokwari Selatan",
        "Kabupaten Pegunungan Arfak",
        "Kabupaten Teluk Bintuni",
        "Kabupaten Teluk Wondama",
    ],
    "Papua Barat Daya": [
        "Kabupaten Maybrat",
        "Kabupaten Raja Ampat",
        "Kabupaten Sorong",
        "Kabupaten Sorong Selatan",
        "Kabupaten Tambrauw",
        "Kota Sorong",
    ],
    "Papua Pegunungan": [
        "Kabupaten Jayawijaya",
        "Kabupaten Lanny Jaya",
        "Kabupaten Mamberamo Tengah",
        "Kabupaten Nduga",
        "Kabupaten Pegunungan Bintang",
        "Kabupaten Tolikara",
        "Kabupaten Yalimo",
        "Kabupaten Yahukimo",
    ],
    "Papua Selatan": [
        "Kabupaten Asmat",
        "Kabupaten Boven Digoel",
        "Kabupaten Mappi",
        "Kabupaten Merauke",
    ],
    "Papua Tengah": [
        "Kabupaten Deiyai",
        "Kabupaten Dogiyai",
        "Kabupaten Intan Jaya",
        "Kabupaten Mimika",
        "Kabupaten Nabire",
        "Kabupaten Paniai",
        "Kabupaten Puncak",
        "Kabupaten Puncak Jaya",
    ],
    Riau: [
        "Kabupaten Bengkalis",
        "Kabupaten Indragiri Hilir",
        "Kabupaten Indragiri Hulu",
        "Kabupaten Kampar",
        "Kabupaten Kepulauan Meranti",
        "Kabupaten Kuantan Singingi",
        "Kabupaten Pelalawan",
        "Kabupaten Rokan Hilir",
        "Kabupaten Rokan Hulu",
        "Kabupaten Siak",
        "Kota Dumai",
        "Kota Pekanbaru",
    ],
    "Sulawesi Barat": [
        "Kabupaten Majene",
        "Kabupaten Mamasa",
        "Kabupaten Mamuju",
        "Kabupaten Mamuju Tengah",
        "Kabupaten Pasangkayu",
        "Kabupaten Polewali Mandar",
    ],
    "Sulawesi Selatan": [
        "Kabupaten Bantaeng",
        "Kabupaten Barru",
        "Kabupaten Bone",
        "Kabupaten Bulukumba",
        "Kabupaten Enrekang",
        "Kabupaten Gowa",
        "Kabupaten Jeneponto",
        "Kabupaten Kepulauan Selayar",
        "Kabupaten Luwu",
        "Kabupaten Luwu Timur",
        "Kabupaten Luwu Utara",
        "Kabupaten Maros",
        "Kabupaten Pangkajene dan Kepulauan",
        "Kabupaten Pinrang",
        "Kabupaten Sidenreng Rappang",
        "Kabupaten Sinjai",
        "Kabupaten Soppeng",
        "Kabupaten Takalar",
        "Kabupaten Tana Toraja",
        "Kabupaten Toraja Utara",
        "Kabupaten Wajo",
        "Kota Makassar",
        "Kota Palopo",
        "Kota Parepare",
    ],
    "Sulawesi Tengah": [
        "Kabupaten Banggai",
        "Kabupaten Banggai Kepulauan",
        "Kabupaten Banggai Laut",
        "Kabupaten Buol",
        "Kabupaten Donggala",
        "Kabupaten Morowali",
        "Kabupaten Morowali Utara",
        "Kabupaten Parigi Moutong",
        "Kabupaten Poso",
        "Kabupaten Sigi",
        "Kabupaten Tojo Una-Una",
        "Kabupaten Tolitoli",
        "Kota Palu",
    ],
    "Sulawesi Tenggara": [
        "Kabupaten Bombana",
        "Kabupaten Buton",
        "Kabupaten Buton Selatan",
        "Kabupaten Buton Tengah",
        "Kabupaten Buton Utara",
        "Kabupaten Kolaka",
        "Kabupaten Kolaka Timur",
        "Kabupaten Kolaka Utara",
        "Kabupaten Konawe",
        "Kabupaten Konawe Kepulauan",
        "Kabupaten Konawe Selatan",
        "Kabupaten Konawe Utara",
        "Kabupaten Muna",
        "Kabupaten Muna Barat",
        "Kabupaten Wakatobi",
        "Kota Baubau",
        "Kota Kendari",
    ],
    "Sulawesi Utara": [
        "Kabupaten Bolaang Mongondow",
        "Kabupaten Bolaang Mongondow Selatan",
        "Kabupaten Bolaang Mongondow Timur",
        "Kabupaten Bolaang Mongondow Utara",
        "Kabupaten Kepulauan Sangihe",
        "Kabupaten Kepulauan Siau Tagulandang Biaro",
        "Kabupaten Kepulauan Talaud",
        "Kabupaten Minahasa",
        "Kabupaten Minahasa Selatan",
        "Kabupaten Minahasa Tenggara",
        "Kabupaten Minahasa Utara",
        "Kota Bitung",
        "Kota Kotamobagu",
        "Kota Manado",
        "Kota Tomohon",
    ],
    "Sumatera Barat": [
        "Kabupaten Agam",
        "Kabupaten Dharmasraya",
        "Kabupaten Kepulauan Mentawai",
        "Kabupaten Lima Puluh Kota",
        "Kabupaten Padang Pariaman",
        "Kabupaten Pasaman",
        "Kabupaten Pasaman Barat",
        "Kabupaten Pesisir Selatan",
        "Kabupaten Sijunjung",
        "Kabupaten Solok",
        "Kabupaten Solok Selatan",
        "Kabupaten Tanah Datar",
        "Kota Bukittinggi",
        "Kota Padang",
        "Kota Padang Panjang",
        "Kota Pariaman",
        "Kota Payakumbuh",
        "Kota Sawahlunto",
        "Kota Solok",
    ],
    "Sumatera Selatan": [
        "Kabupaten Banyuasin",
        "Kabupaten Empat Lawang",
        "Kabupaten Lahat",
        "Kabupaten Muara Enim",
        "Kabupaten Musi Banyuasin",
        "Kabupaten Musi Rawas",
        "Kabupaten Musi Rawas Utara",
        "Kabupaten Ogan Ilir",
        "Kabupaten Ogan Komering Ilir",
        "Kabupaten Ogan Komering Ulu",
        "Kabupaten Ogan Komering Ulu Selatan",
        "Kabupaten Ogan Komering Ulu Timur",
        "Kabupaten Penukal Abab Lematang Ilir",
        "Kota Lubuklinggau",
        "Kota Pagar Alam",
        "Kota Palembang",
        "Kota Prabumulih",
    ],
    "Sumatera Utara": [
        "Kabupaten Asahan",
        "Kabupaten Batu Bara",
        "Kabupaten Dairi",
        "Kabupaten Deli Serdang",
        "Kabupaten Humbang Hasundutan",
        "Kabupaten Karo",
        "Kabupaten Labuhanbatu",
        "Kabupaten Labuhanbatu Selatan",
        "Kabupaten Labuhanbatu Utara",
        "Kabupaten Langkat",
        "Kabupaten Mandailing Natal",
        "Kabupaten Nias",
        "Kabupaten Nias Barat",
        "Kabupaten Nias Selatan",
        "Kabupaten Nias Utara",
        "Kabupaten Padang Lawas",
        "Kabupaten Padang Lawas Utara",
        "Kabupaten Pakpak Bharat",
        "Kabupaten Samosir",
        "Kabupaten Serdang Bedagai",
        "Kabupaten Simalungun",
        "Kabupaten Tapanuli Selatan",
        "Kabupaten Tapanuli Tengah",
        "Kabupaten Tapanuli Utara",
        "Kabupaten Toba",
        "Kota Binjai",
        "Kota Gunungsitoli",
        "Kota Medan",
        "Kota Padang Sidempuan",
        "Kota Pematangsiantar",
        "Kota Sibolga",
        "Kota Tanjungbalai",
        "Kota Tebing Tinggi",
    ],
};

// Provinsi and Kota arrays
arrProvinsi = Object.keys(arrProvinsiKota);
arrKota = [];
for (const key in arrProvinsiKota) {
    const kota = arrProvinsiKota[key];
    arrKota.push(...kota);
}
arrProvinsi.sort();
arrKota.sort();

// Function to update the city select element based on the selected province
function updateCitySelect() {
    const provinceSelect = document.getElementById("provinsi");
    const citySelect = document.getElementById("kota");

    // Clear existing options
    citySelect.innerHTML = "";

    // Add default option
    const defaultOption = document.createElement("option");
    defaultOption.value = "";
    defaultOption.text = "Pilih Kota";
    defaultOption.selected = true;
    defaultOption.disabled = true;
    citySelect.appendChild(defaultOption);

    // Add all option
    const allOption = document.createElement("option");
    allOption.value = "";
    allOption.text = "Semua Kota";
    // allOption.selected = true;
    citySelect.appendChild(allOption);

    const selectedProvince = provinceSelect.value;
    if (selectedProvince == "") {
        for (const key in arrKota) {
            const option = document.createElement("option");
            option.value = arrKota[key];
            option.text = arrKota[key];
            citySelect.appendChild(option);
        }
    } else if (selectedProvince) {
        const cities = arrProvinsiKota[selectedProvince];
        for (const city of cities) {
            const option = document.createElement("option");
            option.value = city;
            option.text = city;
            citySelect.appendChild(option);
        }
    }
}

// Function to update the province select element based on the selected city
function updateProvinceSelect() {
    const citySelect = document.getElementById("kota");
    const provinceSelect = document.getElementById("provinsi");

    const selectedCity = citySelect.value;

    for (const province in arrProvinsiKota) {
        const cities = arrProvinsiKota[province];
        if (cities.includes(selectedCity)) {
            provinceSelect.value = province;
            break;
        }
    }
}
