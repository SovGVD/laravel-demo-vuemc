<template>
    <div class="tags">
        <span class="badge badge-primary" v-for="tag in tags" :key="tag.id">{{ tag.tag }}</span>
    </div>
</template>

<script>
export default {
    props: {
        tags: {
            required: true,
            type: Array,
        }
    },
}
</script>

