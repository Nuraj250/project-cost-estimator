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
        amount
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
  mutation CreateProject($name: String!, $assumed_hours: Int!, $staff: [ID!]) {
    createProject(name: $name, assumed_hours: $assumed_hours, staff: $staff) {
      id
      name
    }
  }
`;

export const GET_STAFF = gql`
  query {
    staff {
      id
      name
      monthly_salary
    }
  }
`;

export const GET_OFFICE_EXPENSES = gql`
  query {
    office_expenses {
      id
      title
      monthly_cost
    }
  }
`;

export const GET_PROJECT_COST = gql`
  query GetProjectCost($id: ID!) {
    projectCost(id: $id) {
      project
      hours
      staff_cost
      office_cost
      total_cost
      cost_per_hour
    }
  }
`;

export const SIMULATE_PAYMENT = gql`
  mutation SimulatePayment($projectId: ID!, $amount: Float!) {
    simulatePayment(projectId: $projectId, amount: $amount) {
      id
      amount
      status
    }
  }
`;
