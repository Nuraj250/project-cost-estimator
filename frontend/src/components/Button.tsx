import React from 'react';

interface ButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement> {
  label: string;
}

const Button: React.FC<ButtonProps> = ({ label, ...props }) => {
  return (
    <button
      className="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-6 rounded-md transition"
      {...props}
    >
      {label}
    </button>
  );
};

export default Button;
