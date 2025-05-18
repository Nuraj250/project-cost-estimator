import { gql } from '@apollo/client';

export const GET_PROJECTS = gql`
  query GetProjects {
    projects {
      id
      name
      assumed_hours
      staff {
        id
        name
      }
      expenses {
        id
        title
        monthly_cost
      }
      payments {
        id
        amount
        status
      }
    }
  }
`;

export const ADD_PROJECT = gql`
  mutation AddProject($name: String!, $assumed_hours: Int!) {
    createProject(name: $name, assumed_hours: $assumed_hours) {
      id
      name
      assumed_hours
    }
  }
`;
