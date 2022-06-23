import { ApolloClient, InMemoryCache } from "@apollo/client";

export const client = new ApolloClient({
    uri: 'https://api-sa-east-1.graphcms.com/v2/cl4nyst4303zg01z3h00w0sld/master',
    cache: new InMemoryCache(),
})