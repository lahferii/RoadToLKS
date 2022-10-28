<template>
    <div class="cart">
        <headerShayna/> 

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text product-more">
                            <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->

        <!-- Shopping Cart Section Begin -->
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th class="p-name text-center">Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody v-if="keranjang.length > 0">
                                            <tr v-for="barang in keranjang" v-bind:key="barang">
                                                <td class="cart-pic first-row">
                                                    <img :src="barang.foto" />
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <h5>{{ barang.nama }}</h5>
                                                </td>
                                                <td class="p-price first-row">Rp.{{ barang.harga }}.000</td>
                                                <td class="delete-item" @click="hapusKeranjang(keranjang.index)">
                                                    <a href="/cart">
                                                        <i class="material-icons">
                                                            Hapus
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody v-else>
                                            <tr class="text-center">
                                                <td colspan="4">Keranjang Kamu Kosong Dasar Miskin</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h4 class="mb-4">
                                    Informasi Pembeli:
                                </h4>
                                <div class="user-checkout">
                                    <form>
                                        <div class="form-group">
                                            <label for="namaLengkap">Nama lengkap</label>
                                            <input v-model="pembeli.nama" type="text" class="form-control" id="namaLengkap" aria-describedby="namaHelp" placeholder="Masukan Nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="namaLengkap">Email Address</label>
                                            <input v-model="pembeli.email" type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Masukan Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="namaLengkap">No. HP</label>
                                            <input v-model="pembeli.telpon" type="text" class="form-control" id="noHP" aria-describedby="noHPHelp" placeholder="Masukan No. HP">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamatLengkap">Alamat Lengkap</label>
                                            <textarea v-model="pembeli.alamat" class="form-control" id="alamatLengkap" rows="3"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="subtotal">ID Transaction <span>#SH12000</span></li>
                                        <li class="subtotal mt-3">Subtotal <span>Rp.{{ subtotal }}.000</span></li>
                                        <li class="subtotal mt-3">Pajak <span>Rp.{{ pajak }}.000</span></li>
                                        <li class="subtotal mt-3">Total Biaya <span>Rp.{{ hargaTotal }}.000</span></li>
                                        <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                        <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                        <li class="subtotal mt-3">Nama Penerima <span>Shayna</span></li>
                                    </ul>
                                    
                                    <a href="#" @click="checkout()" class="proceed-btn">I ALREADY PAID</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart Section End -->
        
        <footerShayna/>
    </div>
</template>

<script>
import headerShayna from '../components/headerShayna.vue';
import footerShayna from '../components/footerShayna.vue';
import axios from 'axios';

export default {
    components:{
        headerShayna,
        footerShayna,
    },
    data(){
        return{
            keranjang: [],
            pembeli:{
                nama: '',
                email: '',
                telpon: '',
                alamat: '',
            }
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
        },
        checkout(){
            let idproduk = this.keranjang.map(function(product){
                return product.id;
            });

            let detailTransaksi = {
                nama: this.pembeli.nama,
                email: this.pembeli.email,
                telpon: this.pembeli.telpon,
                alamat: this.pembeli.alamat,
                total: this.hargaTotal,
                status: "PENDING",
                transaction_details: idproduk
            };
            axios.post('http://127.0.0.1:8000/api/checkout',
                        detailTransaksi
                 )
                 .then(() => this.$router.push("success"))
                 .catch(err => console.log(err));
        }
    },
    computed: {
        subtotal(){
            return this.keranjang.reduce(function(items, data){
                return items + data.harga; 
            },0);
        },
        pajak(){
            return this.subtotal*10/100;
        },
        hargaTotal(){
            return this.subtotal + this.pajak;
        }
    }

}
</script>