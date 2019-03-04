<template>
  <div class="user">
    <Dropdown>
      <a href="javascript:void(0)">
        <Avatar v-if="user.avator" style="margin-right:5px" :src="user.avator"/>
        {{ user.name }}
        <Icon type="ios-arrow-down"></Icon>
      </a>
      <DropdownMenu slot="list">
        <DropdownItem name="alert('中心')">个人中心</DropdownItem>
        <DropdownItem name="logout">退出</DropdownItem>
      </DropdownMenu>
    </Dropdown>
  </div>
</template>
<script>
export default {
  props: {
    user: Object
  },
  methods: {
    info () {
      this.$Message.info('This is a info tip');
    },

    logout () {
      this.$store.dispatch("loadUser");
      window.location.href="http://wumao.doo/";
    }
  }
};
</script>

