<template>
    <div>
        <h2 class="text-center">Products List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preços</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items" :key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.nome }}</td>
                <td>{{ item.precos }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'editar', params: { id: item.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteProduct(item.id)">Deletar</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/items/')
                .then(response => {
                    this.items = response.data;
                });
        },
        methods: {
            deleteProduct(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/items/${id}`)
                    .then(response => {
                        let i = this.items.map(data => data.id).indexOf(id);
                        this.items.splice(i, 1)
                    });
            }
        }
    }
</script>