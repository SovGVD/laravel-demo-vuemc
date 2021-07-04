<template>
  <div class="article">
      <h2><router-link :to="articleRoute">{{ article.title }}</router-link></h2>
      <div class="body">{{ article.description }}</div>
      <tags :tags="article.tags"></tags>
  </div>
</template>

<script>
import Article from '../../Models/Article.js'   // TODO something with paths later
import Tags from './Tags';

export default {
    components: {
        Tags,
    },

    props: {
        article: {
            required: true,
            type: Article,
        },
    },

    computed: {
        articleRoute() {
            return { 
                name: 'article', 
                params: { 
                        id: this.article.id 
                    }
                };
        },
    },
}
</script>
