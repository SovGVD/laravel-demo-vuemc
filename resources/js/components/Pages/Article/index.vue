<template>
    <div class="article">
        <h2>{{ article.title }}</h2>
        <div class="body">{{ article.body }}</div>
        <tags :tags="article.tags"></tags>
    </div>
</template>

<script>
import Article from '../../../Models/Article';
import Tags from '../../Shared/Tags';

export default {
    components: { 
        Tags 
    },

    mounted() {
        this.loadArticle();
    },

    data() {
        return {
            article: new Article,
        };
    },

    props: {
        id: {
            required: true,
        },
    },

    methods: {
        loadArticle() {
            // TODO vue-mc: Laravel put model inside wrapper "data" by default, 
            //              it will be great to make it work without `public static $wrap = null;` in Resource
            this.article.id = this.id;
            this.article.fetch();
        }
    },

}
</script>
