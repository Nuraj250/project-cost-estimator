import { ApolloClient, InMemoryCache } from "@apollo/client";

const client = new ApolloClient({
  uri: "http://localhost:8000/graphql", // ✅ Change if your GraphQL endpoint is different
  cache: new InMemoryCache(),
});

export default client;
