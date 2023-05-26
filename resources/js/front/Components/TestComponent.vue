<template>
    <h1>Coucou</h1>
</template>

<script>
export default {
    name: "TestComponent",
    methods() {
        toto()
        {
            console.log('toto')
        }
    },
    created() {
        this.toto()
    }
}
</script>

<style scoped>

</style>
