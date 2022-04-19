   <!-- Generic sniffs -->

    <!-- Ensures that array are indented one tab stop. -->
    <rule ref="Generic.Arrays.ArrayIndent"/>

    <!-- Bans the use of the PHP long array syntax. -->
    <rule ref="Generic.Arrays.DisallowLongArraySyntax"/>

    <!-- Reports errors if the same class or interface name is used in multiple files. -->
    <rule ref="Generic.Classes.DuplicateClassName"/>

    <!-- Checks against empty PHP statements. -->
    <rule ref="Generic.CodeAnalysis.EmptyPHPStatement"/>

    <!-- Checks against empty statements. -->
    <rule ref="Generic.CodeAnalysis.EmptyStatement"/>

    <!-- Detects for-loops that can be simplified to a while-loop. -->
    <rule ref="Generic.CodeAnalysis.ForLoopShouldBeWhileLoop"/>

    <!-- Detects incrementer jumbling in for loops. -->
    <rule ref="Generic.CodeAnalysis.JumbledIncrementer"/>

    <!-- Detects unconditional if- and elseif-statements. -->
    <rule ref="Generic.CodeAnalysis.UnconditionalIfStatement"/>

    <!-- Detects unnecessary final modifiers inside of final classes. -->
    <rule ref="Generic.CodeAnalysis.UnnecessaryFinalModifier"/>

    <!-- Checks for unused function parameters. -->
    <rule ref="Generic.CodeAnalysis.UnusedFunctionParameter"/>

    <!-- Detects unnecessary overridden methods that simply call their parent. -->
    <rule ref="Generic.CodeAnalysis.UselessOverridingMethod"/>

    <!-- Ensures doc blocks follow basic formatting. -->
    <rule ref="Generic.Commenting.DocComment"/>

    <!-- Warns about FIXME comments. -->
    <!-- <rule ref="Generic.Commenting.Fixme"/> -->

    <!-- Warns about TODO comments. -->
    <!-- <rule ref="Generic.Commenting.Todo"/> -->

    <!-- Ban the use of Yoda conditions. -->
    <rule ref="Generic.ControlStructures.DisallowYodaConditions"/>

    <!-- Verifies that inline control statements are not present. -->
    <rule ref="Generic.ControlStructures.InlineControlStructure"/>

    <!-- A simple sniff for detecting a BOM definition that may corrupt application work. -->
    <rule ref="Generic.Files.ByteOrderMark"/>

    <!-- Ensures the file does not end with a newline character. -->
    <!-- <rule ref="Generic.Files.EndFileNoNewline"/> -->

    <!-- Checks that end of line characters are correct. -->
    <rule ref="Generic.Files.LineEndings"/>

    <!-- Checks the length of all lines in a file. -->
    <rule ref="Generic.Files.LineLength">
        <properties>
            <property name="lineLimit" value="179"/>
            <property name="absoluteLineLimit" value="180"/>
        </properties>
    </rule>	

    <!-- Checks that only one class is declared per file. -->
    <rule ref="Generic.Files.OneClassPerFile"/>

    <!-- Checks that only one interface is declared per file. -->
    <rule ref="Generic.Files.OneInterfacePerFile"/>

    <!-- Checks that only one object structure is declared per file. -->
    <rule ref="Generic.Files.OneObjectStructurePerFile"/>

    <!-- Checks that only one trait is declared per file. -->
    <rule ref="Generic.Files.OneTraitPerFile"/>

    <!-- Ensures each statement is on a line by itself. -->
    <rule ref="Generic.Formatting.DisallowMultipleStatements"/>

    <!-- Checks alignment of assignments. -->
    <rule ref="Generic.Formatting.MultipleStatementAlignment"/>

    <!-- Ensures there is a single space after a NOT operator. -->
    <rule ref="Generic.Formatting.SpaceAfterNot"/>

    <!-- Ensures there is a single space before cast tokens. -->
    <rule ref="Generic.Formatting.SpaceBeforeCast"/>

    <!-- Ensures that variables are not passed by reference when calling a function. -->
    <rule ref="Generic.Functions.CallTimePassByReference"/>

    <!-- Checks that calls to methods and functions are spaced correctly. -->
    <rule ref="Generic.Functions.FunctionCallArgumentSpacing"/>

    <!-- Checks that the opening brace of a function is on the line after the function declaration. -->
    <rule ref="Generic.Functions.OpeningFunctionBraceBsdAllman"/>

    <!-- Checks the cyclomatic complexity (McCabe) for functions. -->
    <rule ref="Generic.Metrics.CyclomaticComplexity"/>

    <!-- Checks the nesting level for methods. -->
    <rule ref="Generic.Metrics.NestingLevel"/>

    <!-- Ensures method and functions are named correctly. -->
    <rule ref="Generic.NamingConventions.CamelCapsFunctionName"/>

    <!-- Bans PHP 4 style constructors. -->
    <rule ref="Generic.NamingConventions.ConstructorName"/>

    <!-- Ensures that constant names are all uppercase. -->
    <rule ref="Generic.NamingConventions.UpperCaseConstantName"/>

    <!-- Bans the use of the backtick execution operator. -->
    <rule ref="Generic.PHP.BacktickOperator"/>

    <!-- Checks that the opening PHP tag is the first content in a file. -->
    <rule ref="Generic.PHP.CharacterBeforePHPOpeningTag"/>

    <!-- Discourages the use of deprecated PHP functions. -->
    <rule ref="Generic.PHP.DeprecatedFunctions"/>

    <!-- Verifies that no alternative PHP tags are used.-->
    <rule ref="Generic.PHP.DisallowAlternativePHPTags"/>

    <!-- Makes sure that shorthand PHP open tags are not used. -->
    <rule ref="Generic.PHP.DisallowShortOpenTag"/>

    <!-- Discourage the use of the PHP `goto` language construct. -->
    <rule ref="Generic.PHP.DiscourageGoto"/>

    <!-- Discourages the use of alias functions. -->
    <rule ref="Generic.PHP.ForbiddenFunctions"/>

    <!-- Checks that all uses of true, false and null are lowercase. -->
    <rule ref="Generic.PHP.LowerCaseConstant"/>

    <!-- Checks that all PHP keywords are lowercase. -->
    <rule ref="Generic.PHP.LowerCaseKeyword"/>

    <!-- Checks that all PHP types are lowercase. -->
    <rule ref="Generic.PHP.LowerCaseType"/>

    <!-- Throws an error or warning when any code prefixed with an asperand is encountered. -->
    <rule ref="Generic.PHP.NoSilencedErrors"/>

    <!-- Ensures the PHP_SAPI constant is used instead of php_sapi_name(). -->
    <rule ref="Generic.PHP.SAPIUsage"/>

    <!-- Ensures PHP believes the syntax is clean. -->
    <rule ref="Generic.PHP.Syntax"/>

    <!-- Checks that two strings are not concatenated together; suggests using one string instead. -->
    <rule ref="Generic.Strings.UnnecessaryStringConcat"/>

    <!-- Check & fix whitespace on the inside of arbitrary parentheses. -->
    <rule ref="Generic.WhiteSpace.ArbitraryParenthesesSpacing"/>

    <!-- Throws errors if tabs are used for indentation. -->
    <rule ref="Generic.WhiteSpace.DisallowTabIndent"/>

    <!-- Verifies spacing between variables and increment/decrement operators. -->
    <rule ref="Generic.WhiteSpace.IncrementDecrementSpacing"/>

    <!-- Ensures all language constructs contain a single space between themselves and their content. -->
    <rule ref="Generic.WhiteSpace.LanguageConstructSpacing"/>

    <!-- Checks that control structures are defined and indented correctly. -->
    <rule ref="Generic.WhiteSpace.ScopeIndent"/>

    <!-- Verifies spacing between the spread operator and the variable/function call it applies to. -->
    <rule ref="Generic.WhiteSpace.SpreadOperatorSpacingAfter"/>

    <!-- PEAR sniffs -->
    
    <!-- Checks the declaration of the class is correct. -->
    <rule ref="PEAR.Classes.ClassDeclaration"/>

    <!-- Checks that no Perl-style comments are used. -->
    <rule ref="PEAR.Commenting.InlineComment"/>

    <!-- Ensure include_once is used in conditional situations and require_once is used elsewhere. -->
    <rule ref="PEAR.Files.IncludingFile"/>

    <!-- Ensures function params with default values are at the end of the declaration. -->
    <rule ref="PEAR.Functions.ValidDefaultValue"/>

    <!-- Checks that object operators are indented correctly. -->
    <rule ref="PEAR.WhiteSpace.ObjectOperatorIndent"/>

    <!-- Checks that the closing braces of scopes are aligned correctly. -->
    <rule ref="PEAR.WhiteSpace.ScopeClosingBrace"/>

    <!-- PSR2 sniffs -->
    
    <!-- Verifies that properties are declared correctly. -->
    <rule ref="PSR2.Classes.PropertyDeclaration"/>

    <!-- Private properties MUST not be prefixed with an underscore -->
    <rule ref="PSR2.Classes.PropertyDeclaration.Underscore">
        <type>error</type>
    </rule>

    <!-- Checks that control structures have the correct spacing around brackets. -->
    <rule ref="PSR2.ControlStructures.ControlStructureSpacing">
        <properties>
            <property name="requiredSpacesAfterOpen" value="1"/>
            <property name="requiredSpacesBeforeClose" value="1"/>
        </properties>
    </rule>

    <!-- Verifies that there are no else if statements (elseif should be used instead). -->
    <rule ref="PSR2.ControlStructures.ElseIfDeclaration"/>

    <!-- Checks that the file does not end with a closing tag. -->
    <rule ref="PSR2.Files.ClosingTag"/>

    <!-- Checks that the closing brace of a function goes directly after the body. -->
    <rule ref="PSR2.Methods.FunctionClosingBrace"/>

    <!-- Checks that the method declaration is correct. -->
    <rule ref="PSR2.Methods.MethodDeclaration"/>

    <!-- Ensures namespaces are declared correctly. -->
    <rule ref="PSR2.Namespaces.NamespaceDeclaration"/>

    <!-- Ensures USE blocks are declared correctly. -->
    <rule ref="PSR2.Namespaces.UseDeclaration"/>

    <!-- PSR12 sniffs -->
    
    <!-- Verifies that classes are instantiated with parentheses. -->
    <rule ref="PSR12.Classes.ClassInstantiation"/>

    <!-- Verifies that nullable type hints are lacking superfluous whitespace, e.g. ?int -->
    <rule ref="PSR12.Functions.NullableTypeDeclaration"/>

    <!-- Ensure return types are defined correctly for functions and closures. -->
    <rule ref="PSR12.Functions.ReturnTypeDeclaration"/>

    <!-- Verifies that the short form of type keywords is used (e.g., int, bool). -->
    <rule ref="PSR12.Keywords.ShortFormTypeKeywords"/>

    <!-- Verifies that operators have valid spacing surrounding them. -->
    <rule ref="PSR12.Operators.OperatorSpacing"/>

    <!-- Verifies that all class constants have their visibility set. -->
    <rule ref="PSR12.Properties.ConstantVisibility"/>
