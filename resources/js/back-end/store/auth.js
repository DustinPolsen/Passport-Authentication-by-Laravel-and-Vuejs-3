export const auth = {
   state: {
      isLoggedIn: localStorage.getItem('AToken') ? true:false ,
      user : ""
 },
   mutations: {
       setIsLoggedIn(state) {
        state.isLoggedIn = true;
      },
      setUser(state , payload) {
         state.user = payload;
      }
 },
   actions: {
      async getUser({ commit }) {
         const { data } = await axios.get("/user");
         commit('setUser', data);
      }
   }
 }
