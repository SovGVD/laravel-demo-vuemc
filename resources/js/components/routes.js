const Article = () => import('./Pages/Article/index');
const Articles = () => import('./Pages/Articles/index');
const ArticlesByPage = () => import('./Pages/ArticlesByPage/index');

export default [
  {
    path: '/',
    name: 'articles',
    component: Articles,
  },
  {
    path: '/page/:pageNum?',
    name: 'articlesByPage',
    component: ArticlesByPage,
    props: (route) => ({ pageNum: Number(route.params.pageNum) || 1 }),
  },
  {
    path: '/article/:id',
    name: 'article',
    component: Article,
    props: true,
  }
];
