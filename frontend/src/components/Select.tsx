import React from 'react';

interface SelectProps extends React.SelectHTMLAttributes<HTMLSelectElement> {
  label: string;
  options: { label: string; value: string }[];
}

const Select: React.FC<SelectProps> = ({ label, options, ...props }) => {
  return (
    <div className="flex flex-col space-y-1 mb-4">
      <label className="text-sm font-medium text-white">{label}</label>
      <select
        className="px-4 py-2 bg-white/10 border border-white/20 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-purple-400"
        {...props}
      >
        {options.map(opt => (
          <option key={opt.value} value={opt.value}>
            {opt.label}
          </option>
        ))}
      </select>
    </div>
  );
};

export default Select;
