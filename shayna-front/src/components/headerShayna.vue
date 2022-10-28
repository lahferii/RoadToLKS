<template>
    <div>
        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="header-top">
                <div class="container">
                    <div class="ht-left">
                        <div class="mail-service">
                            <i class=" fa fa-envelope"></i> hello.shayna@gmail.com
                        </div>
                        <div class="phone-service">
                            <i class=" fa fa-phone"></i> +628 22081996
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="inner-header">
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="img/logo_website_shayna.png" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7"></div>
                        <div class="col-lg-3 text-right col-md-3">
                            <ul class="nav-right">
                                <li class="cart-icon">
                                    Keranjang Belanja &nbsp;
                                    <a href="#">
                                        <i class="icon_bag_alt"></i>
                                        <span v-if="keranjang.length > 0">{{ keranjang.length }}</span>
                                    </a>
                                    <div class="cart-hover">
                                        <div class="select-items">
                                            <table>
                                                <tbody v-if="keranjang.length > 0">
                                                    <tr v-for="barang in keranjang" v-bind:key="barang.id">
                                                        <td class="si-pic">
                                                            <img style="width:100px;" :src="barang.foto" :alt="barang.foto" />
                                                        </td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <h6>{{ barang.nama }}</h6>
                                                                <p>Rp.{{ barang.harga }}.000</p>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i @click="hapusKeranjang(keranjang.index)" class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody v-else>
                                                    <tr class="text-center">
                                                        <td>Ih Kamu Miskin</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>Rp.{{ totalHarga }}.000</h5>
                                        </div>
                                        <div class="select-button">
                                            <router-link to="/cart" class="primary-btn view-card">
                                                VIEW CART
                                            </router-link>
                                            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
    </div>
</template>

<script>
export default {
    data(){
        return{
            keranjang: [],
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
    },
    methods:{
        hapusKeranjang(index){
            this.keranjang.splice(index, 1);
            const parsed = JSON.stringify(this.keranjang);
            localStorage.removeItem('keranjang', parsed);
        }
    },
    computed:{
        totalHarga(){
            return this.keranjang.reduce(function(items, data){
                return items + data.harga;
            },0);
        }
    }
}
</script>