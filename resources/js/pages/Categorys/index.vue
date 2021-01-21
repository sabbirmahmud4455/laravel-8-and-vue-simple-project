<template lang="">
    <div>
        <div class="container">
            <div class=" d-flex p-1">
                <h4>All Category</h4>
                <router-link class='ml-auto btn btn-success' :to="{name:'categorys_create'}">Create Category
                </router-link>
            </div>
            <hr>
            <table class="table table-bordered table-inverse table-responsive">
                <thead class="thead-inverse" style="min-width:100%">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th style="width: 50%;">desctuption</th>
                        <th>action</th>
                    </tr>
                </thead>
                
               
                    <tbody v-if="CategoryData.length">
                        <tr v-for="(category, index) in CategoryData" :key="index">
                            <td scope="row">{{index+1}}</td>
                            <td>{{category.name}}</td>
                            <td>{{category.slug}}</td>
                            <td>{{category.description}} </td>
                            <td class='d-flex'>
                                <router-link :to="{name:'categorys_edit', params:{id: category.id}}" class="btn btn-info mx-1">
                                    Edit</router-link>
                                
                                <a @click.prevent="categoryDestroy(category.id)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                
                <div v-else>
                    <h4 class="text-center p-3">Data Not Found</h4>
                </div>
            </table>
        </div>
    </div>
</template>
<script>
import {
        Form
    }

    from 'vform'

    export default {
        data() {
            return {
                CategoryData: [],

                Category_form: new Form({
                        id: ''
                    }

                )
            }
        },
        methods: {
            getCategorys() {
                axios.get('/api/category').then(response => {
                    this.CategoryData = response.data;
                })
            },
            categoryDestroy(id) {

                axios.delete(`api/category/${id}`).then(response => {
                    this.getCategorys();
                })
                this.$toast.success({
                            title: 'SUCCESS!',
                            message: 'Category Delete Succesfully'
                        })
                
            }
        },
        mounted() {
            this.getCategorys();
        }
    }

</script>
