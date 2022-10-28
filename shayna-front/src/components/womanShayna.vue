<template>
    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5" v-if="products.length > 0">
                    <carousel class="product-slider" :nav="false" :loop="true" :dots="false" :autoplay="true">
                        <div class="product-item m-3" v-for="barang in products" v-bind:key="barang">
                            <div class="pi-pic">
                                <img v-bind:src="barang.galleries[0].foto" v-bind:alt="barang.galleries[0].foto" />
                                <ul>
                                    <li class="w-icon active">
                                        <a href="/" @click="saveCart(barang.id, barang.nama_barang, barang.harga, barang.galleries[0].foto)">
                                            <i class="icon_bag_alt"></i>
                                        </a>
                                    </li>
                                    <li class="quick-view"><a v-bind:href="'#/product/'+barang.id">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ barang.kategori }}</div>
                                <a v-bind:href="'#/product/'+barang.id">
                                    <h5>{{ barang.nama_barang }}</h5>
                                </a>
                                <div class="product-price">
                                    Rp.{{ barang.harga }}.000
                                    <span>Rp.305.000</span>
                                </div>
                            </div>
                        </div>
                    </carousel>
                </div>

                <div class="col-lg-12 mt-6 text-center" v-else>
                    <h5>Toko Sedang Kosong:(</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->
</template>

<script>
import carousel from 'vue-owl-carousel';
import axios from 'axios';

export default {
    components:{
        carousel
    },
    data(){
        return{
            products: [],
            keranjang: [],
        }
    },
    methods:{
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
        axios.get('http://127.0.0.1:8000/api/products')
             .then(res => (this.products = res.data.data.data))
             .catch(err => console.log(err))
    }
}
</script>