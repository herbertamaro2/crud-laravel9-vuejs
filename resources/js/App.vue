<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Lista Produtos</router-link>
                    <router-link to="/criar" class="nav-item nav-link">Criar Produto</router-link>
                </div>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>
 
<script>
    export default {}
</script>