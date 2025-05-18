import React from 'react';

interface InputProps extends React.InputHTMLAttributes<HTMLInputElement> {
  label: string;
}

const Input: React.FC<InputProps> = ({ label, ...props }) => {
  return (
    <div className="flex flex-col space-y-1 mb-4">
      <label className="text-sm font-medium text-white">{label}</label>
      <input
        className="px-4 py-2 bg-white/10 border border-white/20 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-400"
        {...props}
      />
    </div>
  );
};

export default Input;
