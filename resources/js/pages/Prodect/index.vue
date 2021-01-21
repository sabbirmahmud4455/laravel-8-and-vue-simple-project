<template lang="">
    <div>
        <div class="container">
            <div class=" d-flex p-1">
                <h4>Product</h4>
                <router-link class='ml-auto btn btn-success' :to="{name:'product-create'}">Create Product</router-link>
            </div>
            <hr>
            <table class="table table-bordered table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="min-width:200px">Title</th>
                        <th>Sales Price</th>
                        <th>Cost Price</th>
                        <th>Size</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody v-if="products.length" >
                    <tr v-for="(product,index) in products " :key="index">
                            <td scope="row"> {{index+1}}</td> 
                            <td>{{product.name}}</td>
                            <td>{{product.title}}</td>
                            <td>{{product.sales_price}}</td>
                            <td>{{product.cost_price}}</td>
                            <td>{{product.product_size}}</td>
                            <td> <img v-bind:src="product.image" style="max-width: 70px;" class="img-fluid rounded" alt="">   </td>
                            
                            <td class='d-flex'>
                                <router-link :to="{name:'product-view', params:{id: product.id}}" class="btn btn-info">
                                    View</router-link>
                        
                                <router-link :to="{name:'product-edit', params:{id: product.id}}" class="btn btn-success mx-1">
                                    Edit</router-link>
                                
                                <a @click.prevent="productDestroy(product.id)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                </tbody>
                <div v-else>
                        <h3 class="text-center p-3">data not found</h3>
                </div>
            </table>
        </div>
    </div>
</template>
<script>
    
    export default {
        data() {
            return {
                products: []
                
            }
        },
        
        methods: {
            
            getProduct() {
                axios.get('/api/product').then(response => {
                    this.products = response.data;
                    console.log(response.data);
                })
            },
            productDestroy(id) {

                axios.delete(`api/product/${id}`).then(response => {
                    this.getProduct();
                    this.$toast.success({
                            title: 'SUCCESS!',
                            message: response.data
                        })
                })
                
                
            }
        },
        mounted() {
            this.getProduct();
        },

    }

</script>
<style lang=""></style>
