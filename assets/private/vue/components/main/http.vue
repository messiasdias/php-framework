<template>
<div class="home">
    <h1>{{code}}</h1>
    <p>{{msg}}</p>
</div>
</template>
<script>
export default{
    name: "Http",
    props:{
        code: String,
        msg: String
    }
}
</script>