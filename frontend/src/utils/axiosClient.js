import axios from "axios";
import { cookies } from 'next/headers';


const axiosClient = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
  headers: {
    "Content-Type": "application/json",
    Authorization: `Bearer ${cookies().get("ACCESS_TOKEN")}`,
  },
});

axiosClient.interceptors.request.use((config) => {
  const token = cookies().get("ACCESS_TOKEN");
  config.headers.Authorization = `Bearer ${token}`;
  return config;
});

axiosClient.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    try {
      if (error.response.status === 401) {
        cookies().delete("ACCESS_TOKEN");
        window.location.href = "/login";
      }
    } catch (error) {
      console.log(error);
    }
    throw error;
  }
);
export default axiosClient;
