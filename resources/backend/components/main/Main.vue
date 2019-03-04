<style scoped>
</style>
<template>
  <div class="layout">
    <Layout :style="{minHeight: '100vh'}">
      <Sider collapsible :collapsed-width="78" v-model="isCollapsed">
        <menus @goTarget="toPage"></menus>
      </Sider>
      <Layout>
        <Header
          :style="{background: '#fff',height:'45px', boxShadow: '0 2px 3px 2px rgba(0,0,0,.1)'}"
        >
          <div style="float:right;height:auto,height: 45px;line-height: 45px;">
            <user :user="user"></user>
          </div>
        </Header>
        <Content :style="{padding: '10px 16px 16px'}">
          <router-view/>
        </Content>
      </Layout>
    </Layout>
  </div>
</template>
<script>
import User from "./components/user";
import Menus from "./components/menus";
export default {
  data() {
    return {
      //折叠菜单参数
      isCollapsed: false,
      message: "Hello",
      menus: {}
    };
  },
  components: {
    User,
    Menus
  },
  methods: {
    toPage(route) {
      console.log(1);
      console.log(route);
      let { name, params, query } = {};
      if (typeof route === "string") {
        name = route;
      } else {
        name = route.name;
        params = route.params;
        query = route.query;
      }
      if (name.indexOf("newWindows_") > -1) {
        window.open(name.split("_")[1]);
        return;
      }
      this.$router.push({
        name,
        params,
        query
      });
    }
  },

  created() {
    this.$store.dispatch("loadUser");
  },
  computed: {
    user: function() {
      //return {name:'wumao'};
      return this.$store.getters.getUser;
    },
    reversedMessage: function() {
      return this.message
        .split("")
        .reverse()
        .join("");
    },
    //折叠菜单方法
    menuitemClasses: function() {
      return ["menu-item", this.isCollapsed ? "collapsed-menu" : ""];
    }
  }
};
</script>