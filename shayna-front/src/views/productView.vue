<template>
    <div class="product">
        <headerShayna/>
        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="#/"><i class="fa fa-home"></i> Home</a>
                            <span>Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
        
        <!-- Product Shop Section Begin -->
        <section class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" :src="fotoDefault" alt="" />
                                </div>
                                <div class="product-thumbs" v-if="detailProduk.galleries.length > 0">
                                    <carousel class="product-thumbs-track ps-slider" :nav="false" :dots="false">
                                        <div class="pt" v-for="foto in detailProduk.galleries" v-bind:key="foto.id" 
                                            @click="ubahGambar(foto.foto)" :class="foto.foto == fotoDefault ? 'active' : '' ">
                                            <img v-bind:src="foto.foto" v-bind:alt="foto.foto" />
                                        </div>
                                    </carousel>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <span>{{ detailProduk.kategori }}</span>
                                        <h3>{{ detailProduk.nama_barang }}</h3>
                                    </div>
                                    <div class="pd-desc">
                                        <p>{{ detailProduk.desc }}</p>
                                        <h4>Rp.{{ detailProduk.harga }}.000</h4>
                                    </div>
                                    <router-link to="/cart">
                                        <a href="#" 
                                           @click="saveCart(detailProduk.id, detailProduk.nama_barang, detailProduk.harga, detailProduk.galleries[0].foto)" 
                                           class="primary-btn pd-cart">
                                            Add To Cart
                                        </a>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->

        <relatedShayna/>
        <footerShayna/>
    </div>
</template>

<script>
import headerShayna from '../components/headerShayna.vue';
import relatedShayna from '../components/relatedShayna.vue'
import footerShayna from '../components/footerShayna.vue';
import carousel from 'vue-owl-carousel';
import axios from 'axios';

export default {
    name: 'productView',
    components: {
        carousel,
        headerShayna,
        relatedShayna,
        footerShayna,
    },
    data(){
        return{
            fotoDefault: "",
            detailProduk: [],
            keranjang: [],
        }
    },
    methods:{
        ubahGambar(urlGambar){
            this.fotoDefault = urlGambar
        },
        setData(data){
            this.detailProduk = data;
            this.fotoDefault = data.galleries[0].foto;
        },
        saveCart(id, nama_barang, harga, foto){
            let productStored = {
                'id': id,
                'nama': nama_barang,
                'harga': harga,
                'foto': foto,
            }
            
            this.keranjang.push(productStored);
            const parsed = JSON.stringify(this.keranjang);
            localStorage.setItem('keranjang', parsed);
        }
    },
    mounted(){
        if(localStorage.getItem('keranjang')){
            try{
                this.keranjang = JSON.parse(localStorage.getItem('keranjang'));
            }catch(e){
                localStorage.removeItem('keranjang')
            }
        }
        axios.get('http://127.0.0.1:8000/api/products', {
                 params:{
                     id: this.$route.params.id
                 }
             })
             .then(res => (this.setData(res.data.data)))
             .catch(err => console.log(err))
    }
}
</script>

<style scoped>
    .product-thumbs .pt{
            margin: 0 10px;
        }
</style>